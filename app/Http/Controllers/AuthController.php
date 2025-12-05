<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\DeviceBrandHelper;

class AuthController extends Controller
{
    // ================= REGISTER =================

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi menggunakan nomor_hp (unique di tabel users)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
            'nomor_hp' => 'required|string|max:15|unique:users,nomor_hp', // Wajib Unique
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Simpan User dengan nomor HP dan email (jika ada)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null, // Simpan email jika ada, atau null jika kosong
            'nomor_hp' => $validated['nomor_hp'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
            'device_brand' => DeviceBrandHelper::getRandomDeviceBrand(),
        ]);

        Auth::login($user);

        // Buat record CustomerBehavior dengan default nol untuk mencegah error ML
        try {
            \App\Models\CustomerBehavior::create([
                'user_id' => $user->id,
                'plan_type' => 0,
                'device_brand' => DeviceBrandHelper::encodeDeviceBrand($user->device_brand),
                'avg_data_usage_gb' => 0,
                'pct_video_usage' => 0,
                'avg_call_duration' => 0,
                'sms_freq' => 0,
                'monthly_spend' => 0,
                'topup_freq' => 0,
                'travel_score' => 0,
                'complaint_count' => 0,
            ]);
        } catch (\Exception $e) {
            // Jangan blokir registrasi jika gagal membuat behavior, log saja
            logger()->error('Gagal membuat CustomerBehavior: ' . $e->getMessage());
        }

        return redirect()->route('customer.paket-data.index')
            ->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // ================= LOGIN =================

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input login (Nomor HP & Password)
        $credentials = $request->validate([
            'nomor_hp' => 'required|string', // Ganti email jadi nomor_hp
            'password' => 'required',
        ]);

        // Coba login menggunakan kolom 'nomor_hp' di database
        if (Auth::attempt(['nomor_hp' => $credentials['nomor_hp'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // Arahkan customer ke dashboard rekomendasi
                return redirect()->intended(route('customer.dashboard'));
            }
        }

        // Error message jika gagal
        return back()->withErrors([
            'nomor_hp' => 'Nomor HP atau password salah.',
        ])->onlyInput('nomor_hp');
    }

    // ================= LOGOUT =================

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}