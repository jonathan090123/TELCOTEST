<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Tampilkan daftar user (untuk admin)
    public function index()
    {
        // Menggunakan pagination (10 per halaman) agar tidak berat jika user ada ribuan
        // Mengurutkan dari yang terbaru mendaftar
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // 1. Jangan hapus user jika dia admin
        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak bisa menghapus akun Admin.');
        }

        // 2. (Opsional) Proteksi tambahan: Jangan hapus diri sendiri (jika logic role di atas lolos)
        if ($user->id == Auth::id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri saat sedang login.');
        }

        $user->delete();
        
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus');
    }
}