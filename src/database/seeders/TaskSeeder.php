<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Belajar Laravel',
            'description' => 'Mengerjakan UAS pemweb',
            'is_done' => false,
        ]);

        Task::create([
            'title' => 'Tulis BRD dan SRS',
            'description' => 'Dokumentasi aplikasi manajemen tugas harian',
            'is_done' => true,
        ]);

        Task::create([
            'title' => 'Cek API',
            'description' => 'Pastikan endpoint GET/POST/PUT/DELETE berfungsi',
            'is_done' => false,
        ]);
    }
}
