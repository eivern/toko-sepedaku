<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class GlobalCustomerController extends Controller
{
    // Menampilkan semua customer dari semua user (khusus untuk super admin)
    public function index()
    {
        // Ambil semua data customer dan relasi user (pemilik customer)
        $customers = Customer::with('user')->latest()->paginate(10);

        return view('superadmin.customers.index', compact('customers'));
    }

    // Menampilkan form edit data customer tertentu
    public function edit(Customer $customer)
    {
        return view('superadmin.customers.edit', compact('customer'));
    }

    // Menyimpan perubahan data customer
    public function update(Request $request, Customer $customer)
    {
        // Validasi data input tanpa cek kepemilikan (karena super admin punya akses penuh)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);

        // Update data customer
        $customer->update($validated);

        return redirect()->route('superadmin.customers.index')->with('success', 'Data customer berhasil diperbarui oleh Super Admin.');
    }

    // Menghapus data customer
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('superadmin.customers.index')->with('success', 'Customer berhasil dihapus oleh Super Admin.');
    }
}
