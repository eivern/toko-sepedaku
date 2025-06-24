<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Customer;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['customer', 'bicycle'])
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->paginate(10);
        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $adminId = Auth::id();
        $customers = Customer::where('user_id', $adminId)->get();
        // Hanya ambil sepeda yang tersedia dan stok > 0
        $bicycles = Bicycle::where('user_id', $adminId)
                           ->where('status', 'Tersedia')
                           ->where('stock', '>', 0)
                           ->get();
        return view('admin.rentals.create', compact('customers', 'bicycles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'bicycle_id' => 'required|exists:bicycles,id',
            'duration_hours' => 'required|integer|min:1',
        ]);

        $adminId = Auth::id();
        $bicycle = Bicycle::where('id', $request->bicycle_id)
                          ->where('user_id', $adminId)
                          ->firstOrFail();

        // Double check stock dan status
        if ($bicycle->stock < 1 || $bicycle->status !== 'Tersedia') {
            return back()->withErrors(['bicycle_id' => 'Sepeda tidak tersedia atau stok habis.'])->withInput();
        }

        $customer = Customer::where('id', $request->customer_id)
                           ->where('user_id', $adminId)
                           ->firstOrFail();

        $totalPrice = $bicycle->price_per_hour * $request->duration_hours;

        // Gunakan transaksi database untuk memastikan konsistensi data
        try {
            DB::beginTransaction();

            $rental = Rental::create([
                'user_id' => $adminId,
                'customer_id' => $customer->id,
                'bicycle_id' => $bicycle->id,
                'duration_hours' => $request->duration_hours,
                'total_price' => $totalPrice,
                'status' => 'Disewa',
            ]);

            // Kurangi stok sepeda
            $bicycle->decrement('stock');

            // Jika stok jadi 0, ubah status
            if ($bicycle->stock - 1 <= 0) {
                $bicycle->update(['status' => 'Tidak Tersedia']);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal membuat transaksi. Silakan coba lagi.'])->withInput();
        }

        // Redirect ke WhatsApp
        $adminPhone = $request->user()->phone;
        $customerName = $customer->name;
        $bicycleName = $bicycle->name;
        $duration = $request->duration_hours;
        $totalFormatted = 'Rp ' . number_format($totalPrice, 0, ',', '.');

        $message = "Halo Admin, konfirmasi sewa sepeda:\n\n*Nama Penyewa:* {$customerName}\n*Sepeda:* {$bicycleName}\n*Durasi:* {$duration} jam\n*Total Harga:* {$totalFormatted}\n\nTerima kasih.";

        // Pastikan nomor telepon dalam format internasional tanpa simbol '+' atau '0' di depan
        $waPhone = preg_replace('/[^0-9]/', '', $adminPhone);
        if (substr($waPhone, 0, 1) === '0') {
            $waPhone = '62' . substr($waPhone, 1);
        }

        $waLink = 'https://api.whatsapp.com/send?phone=' . $waPhone . '&text=' . urlencode($message);

        return redirect()->away($waLink);
    }
}
