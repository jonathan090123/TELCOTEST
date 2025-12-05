<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Tampilkan daftar user (untuk admin)
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User tidak ditemukan');
        }

        // Jangan hapus user jika dia admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak bisa menghapus admin user');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }
}
