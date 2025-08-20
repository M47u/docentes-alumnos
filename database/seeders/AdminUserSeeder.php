<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Docente',
            'email' => 'admin@uni.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'phone' => '000000000',
            'professional_url' => null,
            'photo_path' => null,
        ]);
    }
}

