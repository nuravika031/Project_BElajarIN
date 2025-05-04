<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin BelajarIN',
                'email' => 'admin@belajarin.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Pengajar Satu',
                'email' => 'pengajar1@belajarin.com',
                'password' => Hash::make('password'),
                'role' => 'pengajar',
            ],
            [
                'name' => 'Siswa Satu',
                'email' => 'siswa1@belajarin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ],
        ]);
    }
}
