<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'suspended',
        ]);

        $adminPhoneNumber = env('ADMIN_WHATSAPP_NUMBER', '6281234567890');
        $message = "Halo Admin SewaSepedaku,\n\n" .
                   "Saya *{$user->name}* ({$user->email}) baru saja mendaftar.\n\n" .
                   "Saya ingin melakukan pembayaran langganan sebesar *Rp 99.000 / bulan* untuk mengaktifkan akun saya.\n\n" .
                   "Mohon kirimkan detail pembayaran. Terima kasih.";

        $waLink = 'https://api.whatsapp.com/send?phone=' . $adminPhoneNumber . '&text=' . urlencode($message);

        session()->flash('status', 'Pendaftaran berhasil! Silakan selesaikan pembayaran melalui WhatsApp untuk mengaktifkan akun Anda.');

        return redirect()->away($waLink);
    }
}
