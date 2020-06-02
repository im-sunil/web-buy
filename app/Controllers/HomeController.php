<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;

class HomeController
{
    public function __construct()
    {
    }

    public function index(RequestInterface $request)
    {
        return [
            'title' => 'My New Simple API',
            'version' => 1,
        ];
    }
}
