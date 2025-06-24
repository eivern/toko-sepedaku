<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GlobalBicycleController extends Controller
{
    public function index()
    {
        // Ambil SEMUA sepeda dari SEMUA user, sertakan relasi user
        $bicycles = Bicycle::with('user')->latest()->paginate(10);
        return view('superadmin.bicycles.index', compact('bicycles'));
    }

    public function edit(Bicycle $bicycle)
    {
        return view('superadmin.bicycles.edit', compact('bicycle'));
    }

    public function update(Request $request, Bicycle $bicycle)
    {
        // Validasi sama seperti di Admin, tapi tanpa cek kepemilikan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
        ]);
        $bicycle->update($validated);
        return redirect()->route('superadmin.bicycles.index')->with('success', 'Data sepeda berhasil diperbarui oleh Super Admin.');
    }

    public function destroy(Bicycle $bicycle)
    {
        if ($bicycle->image) {
            Storage::disk('public')->delete($bicycle->image);
        }
        $bicycle->delete();
        return redirect()->route('superadmin.bicycles.index')->with('success', 'Sepeda berhasil dihapus oleh Super Admin.');
    }
}
