<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        Registration::create([
            'user_id' => 3, // id siswa
            'course_id' => 1,
            'tanggal_daftar' => now(),
        ]);
    }
}
