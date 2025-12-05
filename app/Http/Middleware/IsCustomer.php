<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek login DAN role customer
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }

        // Jika Admin mencoba masuk halaman customer, lempar ke Dashboard Admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Jika belum login
        return redirect('/login');
    }
}