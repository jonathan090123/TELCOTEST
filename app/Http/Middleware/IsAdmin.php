<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek login DAN role admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika dia Customer mencoba masuk Admin, lempar ke halaman Customer
        return redirect()->route('customer.paket-data.index')->with('error', 'Akses ditolak. Halaman ini khusus Admin.');
    }
}
=======

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has admin role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // If not admin, redirect to home with error message
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
    }
}
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
