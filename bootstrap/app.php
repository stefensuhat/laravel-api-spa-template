<?php

use App\Http\Middleware\ConvertRequestToSnakeCase;
use App\Http\Middleware\ConvertResponseToCamelCase;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            ForceJsonResponse::class,
            ConvertRequestToSnakeCase::class,
            ConvertResponseToCamelCase::class,
        ]);
    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix: '',
        health: '/up',
    )
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
