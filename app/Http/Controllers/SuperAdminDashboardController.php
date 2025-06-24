<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients' => User::where('role', 'admin')->count(),
            'total_bicycles' => Bicycle::count(),
            'total_customers' => Customer::count(),
            'total_rentals' => Rental::count(),
            'total_revenue' => Rental::sum('total_price'),
        ];
        return view('superadmin.dashboard.index', compact('stats'));
    }
}
