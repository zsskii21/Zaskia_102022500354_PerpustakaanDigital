<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            ['name' => 'Admin',      'email' => 'admin@perpus.test',      'role' => 'admin',      'password' => 'admin123'],
            ['name' => 'Pustakawan', 'email' => 'pustakawan@perpus.test', 'role' => 'pustakawan', 'password' => 'perpustakawan456'],
            ['name' => 'Anggota',    'email' => 'anggota@perpus.test',    'role' => 'anggota',    'password' => 'user789'],
        ];

        foreach ($akun as $a) {
            User::updateOrCreate(
                ['email' => $a['email']],
                [
                    'name'     => $a['name'],
                    'password' => Hash::make($a['password']),
                    'role'     => $a['role'],
                ]
            );
        }
    }
}