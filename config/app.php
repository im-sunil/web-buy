<?php

return [
    'name' => env('APP_NAME'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        'App\Providers\AppServiceProvider',
    ],

    'middleware' => [
        // 'App\Middleware\ClearValidationErrors',
        // 'App\Middleware\Authenticate',
        // 'App\Middleware\AuthenticateFromCookie',
        // 'App\Middleware\CsrfGuard',
    ]
];
