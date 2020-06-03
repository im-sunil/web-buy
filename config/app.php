<?php

return [
    'name' => env('APP_NAME'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        'App\Providers\AppServiceProvider',
        'App\Providers\DatabaseServiceProvider',
        'App\Providers\ValidationServiceProvider',
    ],

    'middleware' => [
        // 'App\Middleware\ClearValidationErrors',
        // 'App\Middleware\Authenticate',
        // 'App\Middleware\AuthenticateFromCookie',
        // 'App\Middleware\CsrfGuard',
    ]
];
