<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BicycleController extends Controller
{
    public function index()
    {
        $bicycles = Bicycle::where('user_id', Auth::id())->latest()->paginate(10);
        return view('admin.bicycles.index', compact('bicycles'));
    }

    public function create()
    {
        return view('admin.bicycles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bicycles', 'public');
        }
        $request->user()->bicycles()->create($validated);
        return redirect()->route('admin.bicycles.index')->with('success', 'Sepeda berhasil ditambahkan.');
    }

    public function edit(Bicycle $bicycle)
    {
        // Pastikan admin hanya bisa mengedit sepedanya sendiri
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }
        return view('admin.bicycles.edit', compact('bicycle'));
    }

    public function update(Request $request, Bicycle $bicycle)
    {
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($bicycle->image) {
                Storage::disk('public')->delete($bicycle->image);
            }
            $validated['image'] = $request->file('image')->store('bicycles', 'public');
        }

        $bicycle->update($validated);
        return redirect()->route('admin.bicycles.index')->with('success', 'Data sepeda berhasil diperbarui.');
    }

    public function destroy(Bicycle $bicycle)
    {
        if ($bicycle->user_id !== Auth::id()) {
            abort(403);
        }
        if ($bicycle->image) {
            Storage::disk('public')->delete($bicycle->image);
        }
        $bicycle->delete();
        return redirect()->route('admin.bicycles.index')->with('success', 'Sepeda berhasil dihapus.');
    }
}
