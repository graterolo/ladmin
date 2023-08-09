<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // User::truncate();
        User::create([
            'name' => 'Usuario Administrador',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'empresa_id' => 1,
            'activo' => 1,
        ])->assignRole('admin');

        User::create([
            'name' => 'Oly Graterol',
            'username' => 'graterolo',
            'email' => 'olygraterolc@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'empresa_id' => 1,
            'activo' => 1,
        ])->assignRole('admin');

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'empresa_id' => 1,
            'activo' => 1,
        ]);
        $user->assignRole('Super-Admin');
    }
}
