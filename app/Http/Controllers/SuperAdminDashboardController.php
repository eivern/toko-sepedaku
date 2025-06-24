<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    // Menampilkan dashboard untuk super admin
    public function index()
    {
        // Ambil statistik global dari seluruh sistem
        $stats = [
            'total_clients' => User::where('role', 'admin')->count(), // Jumlah total admin (client)
            'total_bicycles' => Bicycle::count(),                     // Total semua sepeda
            'total_customers' => Customer::count(),                   // Total semua customer
            'total_rentals' => Rental::count(),                       // Total semua transaksi rental
            'total_revenue' => Rental::sum('total_price'),            // Total pemasukan dari semua rental
        ];

        // Tampilkan ke view dashboard superadmin
        return view('superadmin.dashboard.index', compact('stats'));
    }
}
