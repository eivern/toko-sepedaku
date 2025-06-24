<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'admin')->latest()->paginate(10);
        return view('superadmin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('superadmin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('superadmin.clients.index')->with('success', 'Client baru berhasil dibuat.');
    }

    public function edit(User $client)
    {
        return view('superadmin.clients.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$client->id],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $data = $request->only('name', 'email', 'phone');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $client->update($data);
        return redirect()->route('superadmin.clients.index')->with('success', 'Data client berhasil diperbarui.');
    }

    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('superadmin.clients.index')->with('success', 'Client berhasil dihapus.');
    }

    public function updateStatus(User $client)
    {
        if ($client->role !== 'admin') {
            abort(404);
        }
        $newStatus = $client->status === 'active' ? 'suspended' : 'active';
        $client->update(['status' => $newStatus]);

        return back()->with('success', 'Status client berhasil diubah menjadi ' . $newStatus);
    }
}
