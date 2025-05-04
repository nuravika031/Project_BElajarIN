<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        Material::create([
            'course_id' => 1,
            'judul' => 'Pengenalan Laravel',
            'konten' => 'Materi tentang Laravel dan framework MVC.',
            'tautan_video' => 'https://youtube.com/embed/laravel101',
        ]);
    }
}
