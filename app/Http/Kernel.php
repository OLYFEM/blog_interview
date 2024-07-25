<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

    protected $routeMiddleware = [
        // ...
        'token' => \App\Http\Middleware\TokenMiddleware::class,
    ];
