<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin akun
        User::updateOrCreate(
            ['email' => 'admin@desa.id'], // email Indonesia
            [
                'name' => 'Admin Desa',
                'password' => Hash::make('admin123'), // password lebih simpel
            ]
        );

        // User biasa
        User::updateOrCreate(
            ['email' => 'warga@desa.id'],
            [
                'name' => 'Warga Desa',
                'password' => Hash::make('warga123'),
            ]
        );

        // Tambahan contoh user petugas
        User::updateOrCreate(
            ['email' => 'petugas@desa.id'],
            [
                'name' => 'Petugas Lapangan',
                'password' => Hash::make('petugas123'),
            ]
        );
    }
}
