<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Admin — tetap pakai firstOrCreate, ini aman
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        // Auto assign super admin
        Artisan::call('shield:super-admin', ['--user' => $user->id]);

        // Profile — hanya isi kalau belum ada data sama sekali
        if (Profile::count() === 0) {
            Profile::create([
                'name'    => 'Fadhil Afiq Badruzzaman',
                'tagline' => 'Full Stack Web Developer',
                'bio'     => 'Saya adalah mahasiswa aktif Program Studi Teknik Informatika di Universitas Esa Unggul yang memiliki minat besar dan fokus mendalam pada pengembangan aplikasi web modern.',
                'email'   => 'fadhilafiqbadruzzaman2402@gmail.com',
                'github'  => 'https://github.com/LuSiNa03',
                'skills'  => ['Laravel', 'Filament', 'Livewire', 'Docker', 'MariaDB', 'Tailwind CSS'],
            ]);
        }

        // Project — hanya isi kalau belum ada data sama sekali
        if (Project::count() === 0) {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'slug'              => 'ebikes-2026',
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'problem_analysis'  => '<p>Isi dari laporan kamu...</p>',
            ]);
        }
    }
}