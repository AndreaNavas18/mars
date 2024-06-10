<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

if (!function_exists('generate_url')) {
    function generate_url($routeName, $parameters = [], $absolute = true) {
        if (config('app.use_https')) {
            return URL::secure($routeName, $parameters, $absolute);
        } else {
            return URL::route($routeName, $parameters, $absolute);
        }
    }
}
