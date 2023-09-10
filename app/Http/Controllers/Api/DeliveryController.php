<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Custom\DeliveryFacade;

class DeliveryController extends Controller
{
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'service'      => 'required',
            'source_kladr' => 'required',
            'target_kladr' => 'required',
            'weight'       => 'required',
        ]);

        $services = explode(',', $validated['service']);       
        foreach ($services as $service) {
            if ($serviceInstance = DeliveryFacade::getService(trim($service), $validated)) {
                DeliveryFacade::addService($serviceInstance);
            }
        }

        $data = DeliveryFacade::calculate();

        return response([ 'data' => $data ]);
    }
}
