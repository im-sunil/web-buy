<?php

namespace App\Jwt;

use \Firebase\JWT\JWT;

class Auth
{
    public static function encode()
    {
        $payload = [
            'iss' => env('JWT_ISS'),
            'aud' => env('JWT_AUD'),
            'iat' => 1356999524,
            'nbf' => 1357000000
        ];
        return JWT::encode($payload, env('JWT_KEY'));
    }

    public static function decode($token)
    {
        try {
            JWT::decode($token, env('JWT_KEY'), ['HS256']);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
