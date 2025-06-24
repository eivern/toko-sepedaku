<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCustomerController extends Controller
{
    // Menampilkan daftar customer milik user yang sedang login
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    // Menampilkan form untuk membuat customer baru
    public function create()
    {
        return view('admin.customers.create');
    }

    // Menyimpan data customer baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);

        // Simpan data customer menggunakan relasi user
        $request->user()->customers()->create($validated);

        // Redirect ke halaman daftar customer dengan pesan sukses
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    // Menampilkan form edit untuk customer tertentu
    public function edit(Customer $customer)
    {
        // Cek apakah customer ini milik user yang login
        if($customer->user_id !== Auth::id()) abort(403);

        return view('admin.customers.edit', compact('customer'));
    }

    // Memperbarui data customer di database
    public function update(Request $request, Customer $customer)
    {
        // Cegah update jika bukan milik user yang login
        if($customer->user_id !== Auth::id()) abort(403);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);

        // Update data customer
        $customer->update($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus customer dari database
    public function destroy(Customer $customer)
    {
        // Cek kepemilikan customer
        if($customer->user_id !== Auth::id()) abort(403);

        // Hapus customer
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
