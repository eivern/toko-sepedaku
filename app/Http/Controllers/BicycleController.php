<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BicycleController extends Controller
{
    // Menampilkan daftar sepeda milik admin yang login
    public function index()
    {
        $bicycles = Bicycle::where('user_id', Auth::id())->latest()->paginate(10);
        return view('admin.bicycles.index', compact('bicycles'));
    }

    // Menampilkan form tambah sepeda baru
    public function create()
    {
        return view('admin.bicycles.create');
    }

    // Menyimpan data sepeda ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Jika user mengupload gambar, simpan gambar ke storage
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bicycles', 'public');
        }

        // Simpan data sepeda baru melalui relasi user
        $request->user()->bicycles()->create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.bicycles.index')->with('success', 'Sepeda berhasil ditambahkan.');
    }

    // Menampilkan form edit sepeda
    public function edit(Bicycle $bicycle)
    {
        // Pastikan sepeda hanya bisa diedit oleh pemiliknya
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.bicycles.edit', compact('bicycle'));
    }

    // Menyimpan update data sepeda
    public function update(Request $request, Bicycle $bicycle)
    {
        // Cek apakah sepeda milik admin
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($bicycle->image) {
                Storage::disk('public')->delete($bicycle->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('bicycles', 'public');
        }

        // Update data sepeda
        $bicycle->update($validated);

        return redirect()->route('admin.bicycles.index')->with('success', 'Data sepeda berhasil diperbarui.');
    }

    // Menghapus sepeda dari database
    public function destroy(Bicycle $bicycle)
    {
        // Cek kepemilikan sepeda
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }

        // Hapus gambar dari storage jika ada
        if ($bicycle->image) {
            Storage::disk('public')->delete($bicycle->image);
        }

        // Hapus data sepeda
        $bicycle->delete();

        return redirect()->route('admin.bicycles.index')->with('success', 'Sepeda berhasil dihapus.');
    }
}
