<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GlobalBicycleController extends Controller
{
    // Menampilkan semua sepeda dari semua user (hanya untuk super admin)
    public function index()
    {
        // Ambil semua sepeda beserta relasi user-nya (pemilik sepeda)
        $bicycles = Bicycle::with('user')->latest()->paginate(10);

        return view('superadmin.bicycles.index', compact('bicycles'));
    }

    // Menampilkan form edit sepeda tertentu
    public function edit(Bicycle $bicycle)
    {
        return view('superadmin.bicycles.edit', compact('bicycle'));
    }

    // Menyimpan perubahan data sepeda
    public function update(Request $request, Bicycle $bicycle)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
        ]);

        // Update data sepeda tanpa cek kepemilikan (karena super admin)
        $bicycle->update($validated);

        return redirect()->route('superadmin.bicycles.index')->with('success', 'Data sepeda berhasil diperbarui oleh Super Admin.');
    }

    // Menghapus sepeda tertentu
    public function destroy(Bicycle $bicycle)
    {
        // Hapus gambar dari storage jika ada
        if ($bicycle->image) {
            Storage::disk('public')->delete($bicycle->image);
        }

        // Hapus data sepeda
        $bicycle->delete();

        return redirect()->route('superadmin.bicycles.index')->with('success', 'Sepeda berhasil dihapus oleh Super Admin.');
    }
}
