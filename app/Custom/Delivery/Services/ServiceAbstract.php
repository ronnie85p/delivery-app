<?php namespace App\Custom\Delivery\Services;

abstract class ServiceAbstract
{
    protected $name = '';
    protected $source_kladr = '';
    protected $target_kladr = '';
    protected $weight = 0.00;

    function __construct(string $source_kladr, string $target_kladr, float $weight)
    {
        $this->source_kladr = $source_kladr;
        $this->target_kladr = $target_kladr;
        $this->weight = $weight;
    }

    public function fetch()
    {
        $resource = dirname(__DIR__, 4) . "/fakes/delivery/services/{$this->name}.json";
        if (file_exists($resource)) {
            return file_get_contents($resource);
        }

        return $resource;
    }

    public function getInfo()
    {
        return ['name' => $this->name];
    }
}