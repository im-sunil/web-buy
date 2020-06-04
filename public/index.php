<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header('Access-Control-Allow-Headers: X-Requested-With');

require_once __DIR__ . '/../bootstrap/app.php';

    (new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit(
        $router->dispatch(
            $container->get('request')
    )
 );
