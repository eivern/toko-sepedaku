<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Fungsi utama dashboard untuk redirect sesuai peran user
    public function index()
    {
        // Ambil role dari user yang sedang login
        $role = Auth::user()->role;

        // Jika role super admin, arahkan ke halaman daftar client
        if ($role === 'super_admin') {
            return redirect()->route('superadmin.clients.index');

        // Jika role admin, arahkan ke halaman daftar sepeda
        } elseif ($role === 'admin') {
            return redirect()->route('admin.bicycles.index');

        // Jika role lain (misal user biasa), arahkan ke halaman utama
        } else {
            return redirect('/');
        }
    }
}
