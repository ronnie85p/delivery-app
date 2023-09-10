<?php 
namespace App\Custom\Delivery\Services;

class FastService extends ServiceAbstract
{   
    protected $name = 'fast';

    public function fetch()
    {
        $data = json_decode(parent::fetch(), true);

        return [
            'price' => (float) $data['price'],
            'date' =>  date('Y-m-d', strtotime("+ {$data['period']} days")),
            'error' => $data['error'] ?: ""
        ];
    }
}