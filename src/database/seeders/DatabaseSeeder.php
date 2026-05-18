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
                'name'    => 'Nama Kamu',
                'tagline' => 'Full Stack Developer',
                'bio'     => 'Mahasiswa Teknik Informatika Universitas Esa Unggul.',
                'email'   => 'kamu@email.com',
                'github'  => 'https://github.com/username',
                'skills'  => ['Laravel', 'Filament', 'Livewire', 'Docker', 'MariaDB', 'Tailwind CSS'],
            ]);
        }

        // Project — hanya isi kalau belum ada data sama sekali
        if (Project::count() === 0) {
            Project::create([
                'title'             => 'Nama Project Akhir Kamu',
                'slug'              => 'project-akhir',
                'short_description' => 'Deskripsi singkat project akhir kamu.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'problem_analysis'  => '<p>Isi dari laporan kamu...</p>',
            ]);
        }
    }
}