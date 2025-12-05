<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Tampilkan beberapa produk unggulan di halaman depan
        // CATATAN: Route ini tidak digunakan di routes/web.php, hanya tersedia untuk legacy
        $produkUnggulan = Product::where('status', 'active')->take(3)->get();
        return view('landing', compact('produkUnggulan'));
    }
}