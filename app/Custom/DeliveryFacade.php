<?php 
namespace App\Custom;
use App\Custom\Delivery\Services\ServiceAbstract;
use \App\Custom\Delivery\Services\SlowService;
use \App\Custom\Delivery\Services\FastService;

class DeliveryFacade
{
    private static $service_classes = [
        "slow" => SlowService::class,
        "fast" => FastService::class,
    ];

    private static $services = [];

    public static function getService(string $name, array $data)
    {
        $class_name = self::$service_classes[$name];
        if (isset($class_name) && class_exists($class_name)) {
            return new $class_name(
                source_kladr: (string) $data['source_kladr'], 
                target_kladr: (string) $data['target_kladr'], 
                weight: (float) $data['weight']
            );
        }
    }

    public static function addService(ServiceAbstract $service)
    {
        self::$services[] = $service;
    }

    public static function calculate()
    {
        $data = [];
        foreach (self::$services as $service) {
            $data[] = $service->getData();
        }

        return $data;
    }
}