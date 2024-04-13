<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/create-user',
            '/create-school',
            '/update-school',
            '/update-school/*',
            '/get-school',
            '/get-school/*',
            '/get-schools',
            '/delete-school',
            '/delete-school/*',
            '/get-juridical-persons',
            '/get-juridical-person',
            '/get-juridical-person/*',
            '/update-juridical-person',
            '/update-juridical-person/*',
            '/create-juridical-person',
            '/delete-juridical-person',
            '/delete-juridical-person/*',
            '/get-physical-persons',
            '/get-physical-person',
            '/get-physical-person/*',
            '/update-physical-person',
            '/update-physical-person/*',
            '/create-physical-person',
            '/delete-physical-person',
            '/delete-physical-person/*',
            '/get-honored-members',
            '/get-honored-member',
            '/get-honored-member/*',
            '/update-honored-member',
            '/update-honored-member/*',
            '/create-honored-member',
            '/delete-honored-member',
            '/delete-honored-member/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
