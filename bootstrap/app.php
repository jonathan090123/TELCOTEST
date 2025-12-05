<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// 1. Import Class Middleware Anda di sini
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
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

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
