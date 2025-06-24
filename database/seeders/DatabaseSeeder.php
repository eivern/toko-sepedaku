<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@sewa.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'phone' => '081234567890',
        ]);

        // Membuat 2 Admin (Client)
        User::create([
            'name' => 'Admin Rental A',
            'email' => 'admin_a@sewa.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '087777777771',
        ]);

        User::create([
            'name' => 'Admin Rental B',
            'email' => 'admin_b@sewa.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '087777777772',
        ]);
    }
}
