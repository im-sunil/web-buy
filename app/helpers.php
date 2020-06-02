<?php

use App\Config\Config;

if (!function_exists('base_path')) {
    function base_path($path = '')
    {
        return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        switch (strtolower($value)) {
            case $value === 'true':
                return true;
            case $value === 'false':
                return false;
            default:
                return $value;
        }
    }
}

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        return  ( new Config)->get($key, $default);
    }
}
