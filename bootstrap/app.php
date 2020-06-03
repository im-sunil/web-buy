<?php

use App\Models\User;
use Doctrine\ORM\EntityManager;
use App\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(base_path());
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}
require_once base_path('/bootstrap/container.php');

$router = $container->get('router');

require_once base_path('routes/api.php');
