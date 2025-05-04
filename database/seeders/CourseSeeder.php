<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'judul' => 'Laravel untuk Pemula',
            'deskripsi' => 'Belajar dasar-dasar Laravel dari nol.',
            'user_id' => 2, // id pengajar
        ]);
    }
}
