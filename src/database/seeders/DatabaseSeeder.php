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
                'github'  => env('GITHUB_REPO', 'https://github.com/LuSiNa03'),
                'linkedin' => null,
                'career_objective' => 'To contribute to innovative software projects in a dynamic environment where I can leverage my full-stack skills, apply best engineering practices, and continue growing as a professional developer.',
                'university' => 'Universitas Esa Unggul',
                'hero_badges' => [
                    ['emoji' => '🔴', 'label' => 'Laravel'],
                    ['emoji' => '⚡', 'label' => 'Full Stack'],
                    ['emoji' => '🎨', 'label' => 'UI/UX'],
                ],
            ]);
        }

        if (\App\Models\Skill::count() === 0) {
            $skills_categorized = [
                [
                    'category' => 'Programming Languages',
                    'items' => [
                        ['name' => 'PHP', 'icon' => '🐘', 'level' => 90],
                        ['name' => 'JavaScript', 'icon' => '⚡', 'level' => 88],
                        ['name' => 'Python', 'icon' => '🐍', 'level' => 75],
                        ['name' => 'SQL', 'icon' => '🗄️', 'level' => 85],
                    ],
                ],
                [
                    'category' => 'Frameworks',
                    'items' => [
                        ['name' => 'Laravel', 'icon' => '🔴', 'level' => 92],
                        ['name' => 'Livewire', 'icon' => '⚡', 'level' => 85],
                        ['name' => 'Filament', 'icon' => '🛡️', 'level' => 88],
                        ['name' => 'Bootstrap', 'icon' => '🅱️', 'level' => 82],
                        ['name' => 'Tailwind CSS', 'icon' => '🌊', 'level' => 90],
                    ],
                ],
                [
                    'category' => 'Database',
                    'items' => [
                        ['name' => 'MySQL', 'icon' => '🐬', 'level' => 88],
                        ['name' => 'MariaDB', 'icon' => '🐘', 'level' => 85],
                    ],
                ],
                [
                    'category' => 'Tools',
                    'items' => [
                        ['name' => 'Git', 'icon' => '🔀', 'level' => 85],
                        ['name' => 'GitHub', 'icon' => '🐙', 'level' => 87],
                        ['name' => 'VS Code', 'icon' => '💻', 'level' => 95],
                        ['name' => 'Docker', 'icon' => '🐳', 'level' => 72],
                    ],
                ],
                [
                    'category' => 'Other Skills',
                    'items' => [
                        ['name' => 'REST API', 'icon' => '🔌', 'level' => 88],
                        ['name' => 'UI/UX Design', 'icon' => '✨', 'level' => 80],
                        ['name' => 'Database Design', 'icon' => '🗂️', 'level' => 85],
                    ],
                ],
            ];
            $order = 0;
            foreach ($skills_categorized as $cat) {
                foreach ($cat['items'] as $item) {
                    \App\Models\Skill::create([
                        'name' => $item['name'],
                        'category' => $cat['category'],
                        'icon' => $item['icon'],
                        'level' => $item['level'],
                        'order' => $order++,
                    ]);
                }
            }
        }

        if (\App\Models\Experience::count() === 0) {
            $experiences = [
                [
                    'role' => 'Freelance Full Stack Web Developer',
                    'company' => 'Self-Employed',
                    'period' => '2022 – Present',
                    'type' => 'Freelance',
                    'description' => 'Delivering custom web applications for clients across various industries. Projects include e-commerce platforms, company profiles, management systems, and API integrations.',
                    'skills' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Filament'],
                    'color' => '#800020',
                ],
                [
                    'role' => 'UI/UX Designer',
                    'company' => 'Various Clients',
                    'period' => '2021 – Present',
                    'type' => 'Freelance',
                    'description' => 'Designing user interfaces and experiences for mobile apps and web platforms. Creating wireframes, prototypes, and high-fidelity mockups using Figma.',
                    'skills' => ['Figma', 'Adobe XD', 'Prototyping', 'User Research'],
                    'color' => '#C41E3A',
                ],
                [
                    'role' => 'Laravel Developer',
                    'company' => 'Academic Projects – Universitas Esa Unggul',
                    'period' => '2023 – Present',
                    'type' => 'Academic',
                    'description' => 'Building production-quality web applications as part of coursework and collaborative projects. Applying software engineering principles and best practices.',
                    'skills' => ['Laravel', 'Livewire', 'MariaDB', 'REST API', 'Docker'],
                    'color' => '#9B1C1C',
                ],
            ];
            foreach ($experiences as $idx => $exp) {
                $exp['order'] = $idx;
                \App\Models\Experience::create($exp);
            }
        }

        if (\App\Models\Education::count() === 0) {
            $education = [
                [
                    'level' => 'Universitas Esa Unggul',
                    'field' => 'Informatics Engineering (Teknik Informatika)',
                    'period' => '2023 – Present',
                    'gpa' => '3.85 / 4.00',
                    'icon' => '🎓',
                    'current' => true,
                ],
                [
                    'level' => 'SMA Negeri 1 Tasikmalaya',
                    'field' => 'Science / IPA',
                    'period' => '2020 – 2023',
                    'icon' => '🏫',
                    'current' => false,
                ],
                [
                    'level' => 'SMP Negeri 2 Tasikmalaya',
                    'field' => 'Junior High School',
                    'period' => '2017 – 2020',
                    'icon' => '🏛️',
                    'current' => false,
                ],
            ];
            foreach ($education as $idx => $edu) {
                $edu['order'] = $idx;
                \App\Models\Education::create($edu);
            }
        }

        if (\App\Models\Certificate::count() === 0) {
            $certificates = [
                [
                    'name' => 'Laravel: From Beginner to Advanced',
                    'issuer' => 'Udemy',
                    'date' => '2023',
                    'image' => 'https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?w=400&h=280&fit=crop&auto=format',
                    'color' => '#800020',
                ],
                [
                    'name' => 'Web Development Bootcamp',
                    'issuer' => 'Dicoding Indonesia',
                    'date' => '2023',
                    'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=280&fit=crop&auto=format',
                    'color' => '#C41E3A',
                ],
                [
                    'name' => 'Python for Data Science',
                    'issuer' => 'Coursera / IBM',
                    'date' => '2024',
                    'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=400&h=280&fit=crop&auto=format',
                    'color' => '#9B1C1C',
                ],
                [
                    'name' => 'UI/UX Design Fundamentals',
                    'issuer' => 'Google / Coursera',
                    'date' => '2023',
                    'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=280&fit=crop&auto=format',
                    'color' => '#7F1D1D',
                ],
                [
                    'name' => 'Cybersecurity Essentials',
                    'issuer' => 'Cisco Networking Academy',
                    'date' => '2024',
                    'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&h=280&fit=crop&auto=format',
                    'color' => '#5C0011',
                ],
                [
                    'name' => 'Git & GitHub Masterclass',
                    'issuer' => 'Udemy',
                    'date' => '2022',
                    'image' => 'https://images.unsplash.com/photo-1618401471353-b98afee0b2eb?w=400&h=280&fit=crop&auto=format',
                    'color' => '#991B1B',
                ],
            ];
            foreach ($certificates as $idx => $cert) {
                $cert['order'] = $idx;
                \App\Models\Certificate::create($cert);
            }
        }

        if (\App\Models\Achievement::count() === 0) {
            $achievements = [
                [
                    'title' => '1st Place – Web Dev Competition',
                    'org' => 'Universitas Esa Unggul',
                    'year' => '2024',
                    'icon' => '🥇',
                    'color' => '#800020',
                    'category' => 'Competition',
                ],
                [
                    'title' => 'Best Graduate Project Award',
                    'org' => 'Faculty of Informatics Engineering',
                    'year' => '2024',
                    'icon' => '🏆',
                    'color' => '#C41E3A',
                    'category' => 'Academic',
                ],
                [
                    'title' => 'Merit Scholarship Recipient',
                    'org' => 'Universitas Esa Unggul',
                    'year' => '2023',
                    'icon' => '🎓',
                    'color' => '#9B1C1C',
                    'category' => 'Scholarship',
                ],
            ];
            foreach ($achievements as $idx => $ach) {
                $ach['order'] = $idx;
                \App\Models\Achievement::create($ach);
            }
        }

        if (\App\Models\Blog::count() === 0) {
            $blogs = [
                [
                    'title' => 'Building Scalable REST APIs with Laravel 11 and Sanctum',
                    'excerpt' => 'A deep dive into architecting production-grade REST APIs using Laravel 11, Sanctum authentication, and best practices for API versioning.',
                    'date' => 'June 28, 2025',
                    'category' => 'Backend',
                    'read_time' => '8 min read',
                    'color' => '#800020',
                    'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&h=380&fit=crop&auto=format',
                ],
                [
                    'title' => 'Glassmorphism UI: Frosted Glass Effects with Tailwind CSS',
                    'excerpt' => 'A practical guide to creating stunning glassmorphism cards, modals, and navbars using Tailwind CSS utility classes and custom backdrop blur.',
                    'date' => 'June 10, 2025',
                    'category' => 'UI/UX',
                    'read_time' => '5 min read',
                    'color' => '#C41E3A',
                    'image' => 'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=600&h=380&fit=crop&auto=format',
                ],
                [
                    'title' => 'My Experience Using Filament v3 for Admin Panel Development',
                    'excerpt' => 'Honest review of Filament Admin Panel v3 after shipping three production projects — performance, extensibility, and lessons learned.',
                    'date' => 'May 22, 2025',
                    'category' => 'Laravel',
                    'read_time' => '6 min read',
                    'color' => '#9B1C1C',
                    'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=380&fit=crop&auto=format',
                ],
                [
                    'title' => 'Introduction to Blockchain: A Developer\'s Perspective',
                    'excerpt' => 'Breaking down blockchain fundamentals — consensus mechanisms, smart contracts, and how developers can start building decentralized apps.',
                    'date' => 'May 5, 2025',
                    'category' => 'Blockchain',
                    'read_time' => '10 min read',
                    'color' => '#5C0011',
                    'image' => 'https://images.unsplash.com/photo-1639762681485-074b7f938ba0?w=600&h=380&fit=crop&auto=format',
                ],
            ];
            foreach ($blogs as $idx => $post) {
                $post['order'] = $idx;
                \App\Models\Blog::create($post);
            }
        }

        // Project — hanya isi kalau belum ada data sama sekali
        if (Project::count() === 0) {
            Project::create([
                'title'             => 'E-Bikes Rental Platform',
                'slug'              => env('E_BIKES_SLUG', 'ebikes-2026'),
                'short_description' => 'Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap.',
                'is_final_project'  => true,
                'status'            => 'on_progress',
                'github_url'        => env('GITHUB_REPO', null),
                'problem_analysis'  => '<p>Platform penyewaan sepeda listrik modern berbasis web dengan fitur manajemen rental yang lengkap, dirancang untuk UTS mata kuliah pemrograman web.</p>',
            ]);
        }
    }
}