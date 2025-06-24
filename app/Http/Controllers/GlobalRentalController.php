<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class GlobalRentalController extends Controller
{
    // Menampilkan semua transaksi rental dari semua user (khusus super admin)
    public function index()
    {
        // Ambil semua data rental beserta relasi: user (pemilik), customer, dan sepeda
        $rentals = Rental::with(['user', 'customer', 'bicycle'])
                         ->latest()           // Urutkan dari transaksi terbaru
                         ->paginate(15);      // Paginasi 15 item per halaman

        return view('superadmin.rentals.index', compact('rentals'));
    }

    // Menghapus transaksi rental tertentu
    public function destroy(Rental $rental)
    {
        // Super admin menghapus transaksi, misalnya jika terjadi kesalahan input
        $rental->delete();

        return back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
