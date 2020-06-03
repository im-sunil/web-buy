<?php

namespace App\Providers;

use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response;
use App\Controllers\HomeController;
use App\Controllers\Auth\RegisterController;
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
        // register the reflection container as a delegate to enable auto wiring

        $request = \Laminas\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
);
        // dump(new Response);
        $container->add(HomeController::class)
        ->addArgument(EntityManager::class)
        ->addArgument(new Response);

        //
        $container->add(RegisterController::class)
        ->addArgument(EntityManager::class)
        ->addArgument(new Response);

        $container->add(Controller::class)
        ->addArgument(new Response);

        //
        $strategy = (new \League\Route\Strategy\ApplicationStrategy)->setContainer($container);
        $router = (new \League\Route\Router)->setStrategy($strategy);
        ;

        $container->share('router', $router);
        $container->share('request', $request);
        $container->share('response', new Response);
    }
}
