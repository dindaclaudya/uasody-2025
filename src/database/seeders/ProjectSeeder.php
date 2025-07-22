<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'name' => 'UAS Pemrograman Web',
            'description' => 'Aplikasi Manajemen Tugas Harian',
            'deadline' => '2025-08-01',
        ]);

        Project::create([
            'name' => 'Belajar Laravel Lanjutan',
            'description' => 'Eksperimen fitur Laravel dan Filament',
            'deadline' => '2025-08-15',
        ]);
    }
}
