<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Cors implements MiddlewareInterface
{
    public function __construct()
    {
    }

    /**
    * {@inheritdoc}
    */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        // invoke the rest of the middleware stack and your controller resulting
        // in a returned response object
        $response = $handler->handle($request);

        return $response;
    }
}
