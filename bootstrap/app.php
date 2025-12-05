<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
<<<<<<< HEAD
// 1. Import Class Middleware Anda di sini
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;
=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
<<<<<<< HEAD
    ->withMiddleware(function (Middleware $middleware) {

    // Alias middleware kamu
    $middleware->alias([
        'is_admin'    => App\Http\Middleware\IsAdmin::class,
        'is_customer' => App\Http\Middleware\IsCustomer::class,
    ]);

    // 👉 Bypass CSRF untuk Midtrans
    $middleware->validateCsrfTokens(except: [
        '/midtrans/callback',
    ]);
})

=======
    ->withMiddleware(function (Middleware $middleware): void {
        // Register custom middleware aliases
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
