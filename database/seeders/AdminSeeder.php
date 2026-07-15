<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun admin jika belum ada
        $admin = User::firstOrCreate(
            ['email' => 'admin@sijaru.com'],
            [
                'name' => 'Admin SIJARU',
                'password' => Hash::make('admin123'),
            ]
        );

        // Memberikan role Admin
        $admin->assignRole('Admin');
    }
}