<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    // Menampilkan daftar client (role: admin)
    public function index()
    {
        $clients = User::where('role', 'admin')->latest()->paginate(10);
        return view('superadmin.clients.index', compact('clients'));
    }

    // Menampilkan form tambah client baru
    public function create()
    {
        return view('superadmin.clients.create');
    }

    // Menyimpan client baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Simpan data client baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
            'role' => 'admin', // Set role default client sebagai admin
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.clients.index')->with('success', 'Client baru berhasil dibuat.');
    }

    // Menampilkan form edit data client
    public function edit(User $client)
    {
        return view('superadmin.clients.edit', compact('client'));
    }

    // Menyimpan perubahan data client
    public function update(Request $request, User $client)
    {
        // Validasi input update
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$client->id],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['nullable', 'confirmed', Password::defaults()], // Password opsional saat update
        ]);

        // Ambil hanya data yang diperlukan
        $data = $request->only('name', 'email', 'phone');

        // Jika password diisi, maka hash dan simpan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update data client
        $client->update($data);

        return redirect()->route('superadmin.clients.index')->with('success', 'Data client berhasil diperbarui.');
    }

    // Menghapus client
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('superadmin.clients.index')->with('success', 'Client berhasil dihapus.');
    }

    // Mengubah status client (aktif/suspend)
    public function updateStatus(User $client)
    {
        // Pastikan hanya client dengan role 'admin' yang bisa diubah statusnya
        if ($client->role !== 'admin') {
            abort(404);
        }

        // Toggle status antara 'active' dan 'suspended'
        $newStatus = $client->status === 'active' ? 'suspended' : 'active';

        // Simpan status baru
        $client->update(['status' => $newStatus]);

        return back()->with('success', 'Status client berhasil diubah menjadi ' . $newStatus);
    }
}
