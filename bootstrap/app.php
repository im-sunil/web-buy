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

require_once base_path('routes/api.php');
