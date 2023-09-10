<?php namespace App\Custom\Delivery\Services;

abstract class ServiceAbstract
{
    protected $name;

    function __construct(
        protected string $source_kladr, 
        protected string $target_kladr, 
        protected float $weight
    ) { }

    public function fetch()
    {
        $resource = dirname(__DIR__, 4) . "/fakes/delivery/services/{$this->name}.json";
        if (file_exists($resource)) {
            return file_get_contents($resource);
        }

        return $resource;
    }

    public function getData()
    {
        return array_merge(
            $this->fetch(),
            [ 'service' => $this->getInfo() ] 
        );
    }

    public function getInfo()
    {
        return ['name' => $this->name];
    }
}