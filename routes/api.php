<?php declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface as IRequest;

// map a route
$router->get('/', function (IRequest $request) : array {
    return [
        'title' => 'My New Simple API',
        'version' => 1,
    ];
});

$router->get('{id}', function (IRequest $request, $id) : array {
    return [
        'title' => 'My New Simple API',
        'version' => $id,
    ];
});
