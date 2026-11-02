<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Rolleri Oluştur
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // 2. Senin için bir Süper Admin hesabı oluştur
        $admin = User::firstOrCreate(
            ['email' => 'mert.dogan3535@gmail.com'], // Giriş yapacağın e-posta
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Aresto35'), // Giriş şifren
                'premium_until' => now()->addYears(10), // Admin sınırsız premiumdur
            ]
        );

        // 3. Admin rolünü bu kullanıcıya ata
        $admin->assignRole('admin');
    }
}
