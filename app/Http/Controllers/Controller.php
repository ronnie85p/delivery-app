<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $layout = 'layouts.default';
    protected $head = 'layouts.head';
    protected $header = 'layouts.header';
    protected $footer = 'layouts.footer';

    protected $title = '';

    protected function render(string $tpl, array $data = [])
    {
        $data = array_merge([
            'title' => $this->title
        ], $data);

        return view($this->layout, array_merge($data, [
            'head' => view($this->head, $data),
            'header' => view($this->header, $data),
            'footer' => view($this->footer, $data),
            'content' => view($tpl, $data)
        ]));
    }   
}
