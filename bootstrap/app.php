<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(base_path());
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    dump($e->getMessage());
}
require_once base_path('/bootstrap/container.php');

$router = $container->get('router');

$router->middleware(new Tuupola\Middleware\CorsMiddleware([
    'origin' => ['*'],
    'methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'],
    'headers.allow' => [],
    'headers.expose' => [],
    'credentials' => false,
    'cache' => 0,
]));

require_once base_path('routes/api.php');
