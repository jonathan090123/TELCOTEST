<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
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
        
        // Riwayat pembelian
        Route::get('/riwayat/pembelian', [PaketDataController::class, 'riwayat'])->name('riwayat');
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
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // CRUD Paket Data untuk Admin
    Route::resource('paket-data', PaketDataController::class)->except(['show']);
    
    // Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});