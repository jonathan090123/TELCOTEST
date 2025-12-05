<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $produkPopuler = Product::withCount(['transactions' => function($q) {
            $q->where('status', 'success');
        }])
        ->orderBy('transactions_count', 'desc')
        ->take(6)
        ->get();

        $semuaProduk = $produkPopuler;

        return view('welcome', compact('produkPopuler', 'semuaProduk'));
    }
}
