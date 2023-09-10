<?php 
namespace App\Custom;

class DeliveryFacade
{
    static public function getService(string $service_class, array $data)
    {
        if (class_exists($service_class)) {
            return new $service_class(
                (string) $data['source_kladr'], 
                (string) $data['target_kladr'], 
                (float) $data['weight']
            );
        }
    }

    static public function calculate(array $services)
    {
        $data = [];
        foreach ($services as $service) {
            $data[] = array_merge(
                $service->fetch(),
                [ 'service' => $service->getInfo() ] 
            );
        }

        return $data;
    }
}