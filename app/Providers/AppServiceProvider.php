<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use League\Route\RouteCollection;
use App\Controllers\HomeController;
use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Strategy\ApplicationStrategy;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    protected $provides = [
        'router',
        'response',
        'request',
        'emitter'
    ];

    public function boot()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $container = $this->getContainer();

        $request = \Laminas\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
);

        //
        $responseFactory = new \Laminas\Diactoros\ResponseFactory();

        $jsonStrategy = new \League\Route\Strategy\JsonStrategy($responseFactory);

        $router = (new \League\Route\Router)->setStrategy($jsonStrategy);

        $container->share('router', $router);
        $container->share('request', $request);
    }
}
