<?php

require_once __DIR__ . '/../bootstrap/app.php';

    (new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit(
        $router->dispatch(
            $container->get('request')
    )
 );
