<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class GlobalRentalController extends Controller
{
    public function index()
    {
        // Ambil SEMUA transaksi, sertakan relasi user, customer, dan bicycle
        $rentals = Rental::with(['user', 'customer', 'bicycle'])->latest()->paginate(15);
        return view('superadmin.rentals.index', compact('rentals'));
    }

    public function destroy(Rental $rental)
    {
        // Super admin bisa menghapus transaksi jika ada kesalahan
        $rental->delete();
        return back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
