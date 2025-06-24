<?php

use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminRentalController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GlobalBicycleController;
use App\Http\Controllers\GlobalCustomerController;
use App\Http\Controllers\GlobalRentalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect dashboard berdasarkan role
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// === SUPER ADMIN ROUTES ===
// Grup rute ini hanya dapat diakses oleh pengguna dengan peran 'super_admin'.
Route::prefix('superadmin')
    ->name('superadmin.')
    ->middleware(['auth', 'superadmin'])
    ->group(function () {

    // Dashboard utama Super Admin
    Route::get('/', [SuperAdminDashboardController::class, 'index'])->name('dashboard');

    // Manajemen penuh akun client (Admin)
    Route::resource('clients', ClientController::class);
    // Rute khusus untuk mengubah status aktif/suspend client
    Route::patch('clients/{client}/status', [ClientController::class, 'updateStatus'])->name('clients.updateStatus');

    // Pengawasan dan pengelolaan data global (milik semua client)
    Route::resource('bicycles', GlobalBicycleController::class)->except(['create', 'store', 'show']);
    Route::resource('customers', GlobalCustomerController::class)->except(['create', 'store', 'show']);
    Route::resource('rentals', GlobalRentalController::class)->only(['index', 'destroy']);
});


// === ADMIN (CLIENT) ROUTES ===
// Grup rute ini hanya dapat diakses oleh pengguna dengan peran 'admin'.
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

    // Manajemen data yang hanya milik admin yang sedang login
    Route::resource('bicycles', BicycleController::class);
    Route::resource('customers', AdminCustomerController::class);
    // Admin hanya bisa membuat transaksi baru dan melihat riwayatnya sendiri
    Route::resource('rentals', AdminRentalController::class)->only(['index', 'create', 'store']);
});


require __DIR__.'/auth.php';
