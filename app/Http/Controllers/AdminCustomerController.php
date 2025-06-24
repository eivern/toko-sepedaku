<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);
        $request->user()->customers()->create($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit(Customer $customer)
    {
        if($customer->user_id !== Auth::id()) abort(403);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        if($customer->user_id !== Auth::id()) abort(403);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
        ]);
        $customer->update($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Data customer berhasil diperbarui.');
    }

    public function destroy(Customer $customer)
    {
        if($customer->user_id !== Auth::id()) abort(403);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
