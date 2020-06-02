<?php

use App\Providers\AppServiceProvider;

$container = new League\Container\Container;

$container->addServiceProvider(AppServiceProvider::class);

$container->delegate(
    new League\Container\ReflectionContainer
);
