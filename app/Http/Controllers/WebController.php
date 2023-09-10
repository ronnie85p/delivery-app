<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

    public $title = 'Калькулятор доставки';

    public function index(Request $request)
    {   
        return $this->render('web.index');
    }
}
