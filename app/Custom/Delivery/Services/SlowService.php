<?php 
namespace App\Custom\Delivery\Services;

class SlowService extends ServiceAbstract
{   
    protected $name = 'slow';
    private $base_cost = 150;

    public function fetch()
    {
        $data = json_decode(parent::fetch(), true);

        return [
            'price' => (float) $data['coefficient'] * $this->base_cost,
            'date' =>  $data['date'] ?: date('Y-m-d'),
            'error' => $data['error'] ?: ""
        ];
    }
}