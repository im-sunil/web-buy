<?php declare(strict_types=1);

use App\Jwt\Auth;
use App\Controllers\HomeController;
use App\Controllers\Auth\RegisterController;
use Psr\Http\Message\ServerRequestInterface;

$router->get('/', [
    HomeController::class, 'index'
])->setName('home');

//  auth
$router->group('/api/user', function (\League\Route\RouteGroup $route) {
    $route->post('/register', [
        RegisterController::class, 'store'
    ])->setName('auth.register');
});

$router->map('GET', '/token', function (ServerRequestInterface $request) : ResponseInterface {
    $response = new Laminas\Diactoros\Response;

    $a = Auth::decode($request->getHeaderLine('Authorization'));
    dump('1', $decoded_array = (array) $a);
    $response->getBody()->write('<h1>Hello, World!</h1>');
    return $response;
});
