<?php

return [
    'mysql' => [
        'driver' => env('DB_DRIVER', 'pdo_mysql'),
        'host' => env('DB_HOST', '127.0.0.1'),
        'dbname' => env('DB_DATABASE', 'webuy'),
        'user' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'port' => env('DB_PORT')
    ]
];
