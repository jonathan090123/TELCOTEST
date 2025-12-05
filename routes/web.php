<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
// 👇 PENTING: Import Auth facade agar tidak error saat Auth::logout()
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Import Controller Admin (Menggunakan Alias 'as' agar tidak bentrok)
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Import Controller Customer (Menggunakan Alias 'as' agar tidak bentrok)
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\TransaksiController as CustomerTransaksiController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Customer\TransaksiController;
use App\Http\Controllers\MidtransCallbackController;

=======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketDataController;
use App\Http\Controllers\Admin\PaketDataController as AdminPaketDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

<<<<<<< HEAD
// ================= PUBLIC ROUTES (Bisa diakses siapa saja) =================

// 👇 FIX ERROR 1: Route [about] not defined
Route::get('/about', function () {
    // Anda bisa mengganti ini dengan view('about') jika file view sudah dibuat
    return "Halaman Tentang Kami (Silakan buat file resources/views/about.blade.php)";
})->name('about');


// ================= GUEST (Belum Login) =================
Route::middleware(['guest'])->group(function () {

    // 1. Halaman Depan (Welcome / Landing Page)
    Route::get('/', function () {
        // Ambil 9 paket: 3 Telkomsel, 3 XL, 3 Tri untuk tampilan guest user
        $telkomsel = \App\Models\Product::where('operator', 'Telkomsel')->where('status', 'active')->limit(3)->get();
        $xl = \App\Models\Product::where('operator', 'XL')->where('status', 'active')->limit(3)->get();
        $tri = \App\Models\Product::where('operator', 'Tri')->where('status', 'active')->limit(3)->get();

        // Gabungkan semua untuk grid 9 paket
        $semuaProduk = $telkomsel->merge($xl)->merge($tri);

        // Produk populer untuk carousel
        $produkPopuler = \App\Models\Product::where('is_popular', true)->take(3)->get();
        if ($produkPopuler->isEmpty()) {
            $produkPopuler = \App\Models\Product::where('status', 'active')->take(3)->get();
        }

        $user = Auth::user();

        // Kirim ke welcome view
        return view('welcome', compact('semuaProduk', 'produkPopuler', 'user'));
    })->name('welcome');

    // 2. Login (Form & Proses)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // 3. Register (Form & Proses)
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// ================= AUTHENTICATED (Sudah Login) =================
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 👇 FIX UTAMA: Route Dispatcher (Pengarah Jalan)
    Route::get('/home', function () {

        /** @var \App\Models\User $user */
        // PERBAIKAN: Gunakan Auth::user() alih-alih auth()->user() agar editor tidak merah
        $user = Auth::user();

        // Cek 1: Apakah user object valid?
        if (!$user) {
            return redirect()->route('login')->with('error', 'Sesi habis, silakan login kembali.');
        }

        // Cek 2: Arahkan Admin ke Dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Cek 3: Arahkan Customer ke Dashboard rekomendasi
        if ($user->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        // Cek 4: Jika role aneh, logout paksa
        Auth::logout();
        return redirect()->route('login')->with('error', 'Role user tidak valid.');

    })->name('home');

    // 👇 FIX ERROR 2: Mencegah error "Route [dashboard] not defined"
    // Karena di layout app.blade.php ada pemanggilan route('dashboard'), kita buat alias ke 'home'
    Route::get('/dashboard-redirect', function() {
        return redirect()->route('home');
    })->name('dashboard');


    // ================= GROUP ADMIN =================
    Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', AdminProductController::class);

        // Transaksi Admin
        Route::get('/transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi.index');
        Route::patch('/transaksi/{id}/status', [AdminTransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');

        // User Management
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    });

    // ================= GROUP CUSTOMER =================
    Route::middleware(['is_customer'])->name('customer.')->group(function () {
        // Katalog
        Route::get('/katalog', [CustomerProductController::class, 'index'])->name('paket-data.index');
        Route::get('/katalog/{id}', [CustomerProductController::class, 'show'])->name('paket-data.show');

        // Transaksi Flow
        Route::get('/beli/{productId}', [CustomerTransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/beli/{productId}', [CustomerTransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/pembayaran/{id}', [CustomerTransaksiController::class, 'pembayaran'])->name('transaksi.pembayaran');
        Route::post('/transaksi/pembayaran/{id}', [CustomerTransaksiController::class, 'prosesPembayaran'])->name('transaksi.bayar');
        Route::get('/riwayat-transaksi', [CustomerTransaksiController::class, 'riwayat'])->name('transaksi.riwayat');
        Route::post('/transaksi/{id}/check-payment-status', [CustomerTransaksiController::class, 'checkPaymentStatus'])->name('transaksi.checkStatus');
    });

    // Customer dashboard (rekomendasi + ringkasan)
    Route::middleware(['is_customer'])->name('customer.')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    });

    // ================= PROFILE ROUTE (AUTHENTICATED) =================
    // Route profile untuk user yang sudah login (admin atau customer)
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', function () {
            $user = Auth::user();
            return view('customer.profile.index', compact('user'));
        })->name('profile.index');

        Route::put('/profile/update', function () {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if ($user) {
                $user->update(request()->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'nullable|email|max:255',
                ]));
            }
            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
        })->name('profile.update');

        Route::put('/profile/password', function () {
            request()->validate([
                'current_password' => 'required|current_password',
                'password' => 'required|string|min:8|confirmed',
            ]);
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if ($user) {
                $user->update(['password' => bcrypt(request('password'))]);
            }
            return redirect()->route('profile.index')->with('success', 'Password berhasil diubah');
        })->name('profile.password');
    });

});

// Route Checkout Paket Data (Harus Login)
Route::get('/checkout/{id}', [TransactionController::class, 'checkout'])
    ->middleware('auth');

// Midtrans Callback URL
Route::post('/midtrans/callback', [MidtransCallbackController::class, 'callback'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);




=======
// Route untuk halaman utama
use App\Models\PaketData;

Route::get('/', function () {
    $paketData = PaketData::where('status', 'active')
        ->orderBy('harga', 'asc')
        ->take(4)
        ->get();

    return view('welcome', compact('paketData'));
})->name('home');

// Route untuk halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Route untuk Authentication (Guest only)
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    // Register Routes
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Route untuk Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route Paket Data (Public - bisa dilihat tanpa login)
Route::prefix('paket-data')->name('paket-data.')->group(function () {
    // Halaman list semua paket (public)
    Route::get('/', [PaketDataController::class, 'index'])->name('index');
    
    // Halaman detail paket (public)
    Route::get('/{id}', [PaketDataController::class, 'show'])->name('show');
});

// Route yang memerlukan authentication
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Paket Data - Beli & Riwayat (Require Auth)
    Route::prefix('paket-data')->name('paket-data.')->group(function () {
        // Halaman beli paket
        Route::get('/{id}/beli', [PaketDataController::class, 'beliPaket'])->name('beli');
        Route::post('/{id}/beli', [PaketDataController::class, 'prosesBeliPaket'])->name('beli.proses');
        
        // Halaman pembayaran untuk transaksi yang dibuat
        Route::get('/transaksi/{transaksi}/bayar', [PaketDataController::class, 'showPembayaran'])->name('pembayaran.show');
        Route::post('/transaksi/{transaksi}/bayar', [PaketDataController::class, 'prosesPembayaran'])->name('pembayaran.proses');
        
        // Riwayat pembelian
        Route::get('/riwayat/pembelian', [PaketDataController::class, 'riwayat'])->name('riwayat');
    });
    
    // Transaksi Customer
    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('/', [DashboardController::class, 'transaksiCustomer'])->name('index');
    });
    
    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [AuthController::class, 'profile'])->name('index');
        Route::put('/update', [AuthController::class, 'updateProfile'])->name('update');
        Route::put('/password', [AuthController::class, 'updatePassword'])->name('password');
    });
});

// Route untuk admin (jika diperlukan)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    
    // Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Manajemen Transaksi Admin
    Route::get('/transaksi', [DashboardController::class, 'transaksiIndex'])->name('transaksi.index');
    
    // Admin Paket Data CRUD
    Route::resource('paket-data', AdminPaketDataController::class)->names('paket-data');
});
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
