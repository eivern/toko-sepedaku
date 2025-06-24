<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role === 'super_admin') {
            return redirect()->route('superadmin.clients.index');
        } elseif ($role === 'admin') {
            return redirect()->route('admin.bicycles.index');
        } else {
            // Pengguna biasa atau role lain bisa diarahkan ke halaman utama
            return redirect('/');
        }
    }
}
