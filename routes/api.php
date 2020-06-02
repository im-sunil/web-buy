<?php declare(strict_types=1);

use App\Controllers\HomeController;
use Psr\Http\Message\ServerRequestInterface as IRequest;

$router->get('/', [HomeController::class, 'index'])->setName('home');
