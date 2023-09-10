<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Custom\DeliveryFacade;

class DeliveryController extends Controller
{
    private $services = [
        "slow" => \App\Custom\Delivery\Services\SlowService::class,
        "fast" => \App\Custom\Delivery\Services\FastService::class,
    ];

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'service'      => 'required',
            'source_kladr' => 'required',
            'target_kladr' => 'required',
            'weight'       => 'required',
        ]);

        $services = explode(',', $validated['service']);       
        foreach ($services as $srv_name) {
            $srv_class = $this->services[trim($srv_name)];
            if (isset($srv_class) && class_exists($srv_class)) {
                $deliveryServices[] = DeliveryFacade::getService($srv_class, $validated);
            }
        }

        $data = DeliveryFacade::calculate($deliveryServices);

        return response([ 'data' => $data ]);
    }
}
