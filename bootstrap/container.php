<?php

use Doctrine\ORM\EntityManager;
use App\Controllers\HomeController;
use App\Providers\AppServiceProvider;

$container = new League\Container\Container;

$container->addServiceProvider(AppServiceProvider::class);

$container->delegate(
    new League\Container\ReflectionContainer
);

$container->addServiceProvider(new App\Providers\ConfigServiceProvider());

foreach ($container->get('config')->get('app.providers') as $provider) {
    $container->addServiceProvider($provider);
}
