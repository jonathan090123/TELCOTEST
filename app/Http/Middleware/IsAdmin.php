<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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