<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class GlobalCustomerController extends Controller
{
    public function index()
    {
        // Ambil SEMUA customer dari SEMUA user, sertakan relasi user (pemilik data)
        $customers = Customer::with('user')->latest()->paginate(10);
        return view('superadmin.customers.index', compact('customers'));
    }

    public function edit(Customer $customer)
    {
        return view('superadmin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        // Validasi sama seperti di Admin, tapi tanpa cek kepemilikan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);
        $customer->update($validated);
        return redirect()->route('superadmin.customers.index')->with('success', 'Data customer berhasil diperbarui oleh Super Admin.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('superadmin.customers.index')->with('success', 'Customer berhasil dihapus oleh Super Admin.');
    }
}
