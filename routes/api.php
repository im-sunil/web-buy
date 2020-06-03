<?php declare(strict_types=1);

use App\Controllers\HomeController;
use Psr\Http\Message\ServerRequestInterface as IRequest;

$responseFactory = new \Laminas\Diactoros\ResponseFactory();

$router->get('/', [HomeController::class, 'index'])->setName('home');
