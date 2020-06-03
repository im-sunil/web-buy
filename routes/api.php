<?php declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\Auth\RegisterController;

$router->get('/', [
    HomeController::class, 'index'
])->setName('home');

//  auth
$router->post('/register', [
    RegisterController::class, 'store'
])->setName('auth.register');
