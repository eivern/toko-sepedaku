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
    // Menampilkan daftar penyewaan milik admin yang sedang login
    public function index()
    {
        $rentals = Rental::with(['customer', 'bicycle']) // Eager load relasi customer dan bicycle
                        ->where('user_id', Auth::id())    // Filter hanya rental milik admin
                        ->latest()                        // Urutkan dari yang terbaru
                        ->paginate(10);                   // Paginasi 10 data per halaman

        return view('admin.rentals.index', compact('rentals'));
    }

    // Menampilkan form penyewaan baru
    public function create()
    {
        $adminId = Auth::id();

        // Ambil semua customer milik admin
        $customers = Customer::where('user_id', $adminId)->get();

        // Ambil semua sepeda milik admin yang tersedia dan stoknya > 0
        $bicycles = Bicycle::where('user_id', $adminId)
                           ->where('status', 'Tersedia')
                           ->where('stock', '>', 0)
                           ->get();

        return view('admin.rentals.create', compact('customers', 'bicycles'));
    }

    // Menyimpan data penyewaan ke database
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'bicycle_id' => 'required|exists:bicycles,id',
            'duration_hours' => 'required|integer|min:1',
        ]);

        $adminId = Auth::id();

        // Ambil data sepeda yang dipilih milik admin
        $bicycle = Bicycle::where('id', $request->bicycle_id)
                          ->where('user_id', $adminId)
                          ->firstOrFail();

        // Cek kembali stok dan status sepeda
        if ($bicycle->stock < 1 || $bicycle->status !== 'Tersedia') {
            return back()->withErrors(['bicycle_id' => 'Sepeda tidak tersedia atau stok habis.'])->withInput();
        }

        // Ambil data customer yang dipilih milik admin
        $customer = Customer::where('id', $request->customer_id)
                           ->where('user_id', $adminId)
                           ->firstOrFail();

        // Hitung total harga sewa berdasarkan durasi dan harga per jam
        $totalPrice = $bicycle->price_per_hour * $request->duration_hours;

        // Jalankan transaksi database untuk menjamin konsistensi
        try {
            DB::beginTransaction();

            // Simpan data rental baru
            $rental = Rental::create([
                'user_id' => $adminId,
                'customer_id' => $customer->id,
                'bicycle_id' => $bicycle->id,
                'duration_hours' => $request->duration_hours,
                'total_price' => $totalPrice,
                'status' => 'Disewa',
            ]);

            // Kurangi stok sepeda sebanyak 1
            $bicycle->decrement('stock');

            // Jika stok habis setelah dikurangi, ubah status sepeda
            if ($bicycle->stock - 1 <= 0) {
                $bicycle->update(['status' => 'Tidak Tersedia']);
            }

            DB::commit(); // Simpan perubahan
        } catch (\Exception $e) {
            DB::rollBack(); // Kembalikan perubahan jika terjadi error
            return back()->withErrors(['error' => 'Gagal membuat transaksi. Silakan coba lagi.'])->withInput();
        }

        // Buat pesan konfirmasi untuk dikirim via WhatsApp
        $adminPhone = $request->user()->phone;
        $customerName = $customer->name;
        $bicycleName = $bicycle->name;
        $duration = $request->duration_hours;
        $totalFormatted = 'Rp ' . number_format($totalPrice, 0, ',', '.');

        $message = "Halo Admin, konfirmasi sewa sepeda:\n\n*Nama Penyewa:* {$customerName}\n*Sepeda:* {$bicycleName}\n*Durasi:* {$duration} jam\n*Total Harga:* {$totalFormatted}\n\nTerima kasih.";

        // Konversi nomor admin ke format internasional (untuk WhatsApp)
        $waPhone = preg_replace('/[^0-9]/', '', $adminPhone);
        if (substr($waPhone, 0, 1) === '0') {
            $waPhone = '62' . substr($waPhone, 1);
        }

        // Buat link WhatsApp dengan pesan otomatis
        $waLink = 'https://api.whatsapp.com/send?phone=' . $waPhone . '&text=' . urlencode($message);

        // Redirect ke WhatsApp
        return redirect()->away($waLink);
    }
}
