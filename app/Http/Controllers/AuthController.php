<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
<<<<<<< HEAD
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
=======

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    {
        return view('auth.login');
    }

<<<<<<< HEAD
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
=======
    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Redirect ke admin dashboard jika admin
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login berhasil!');
            }
            
            // Redirect ke homepage (beranda) untuk customer
            return redirect()->intended(route('home'))->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer', // Default role customer
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }

    // Tampilkan profile
    public function profile()
    {
        return view('customer.profile.index', [
            'user' => Auth::user()
        ]);
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15|unique:users,phone,' . $user->id,
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile berhasil diupdate!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        return back()->with('success', 'Password berhasil diubah!');
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    }
}