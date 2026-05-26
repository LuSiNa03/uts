@extends('layouts.portfolio')
@section('title', 'Home - Portfolio')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-[85vh] flex items-center overflow-hidden py-16 sm:py-24">
    <!-- Subtle Background Glows -->
    <div class="absolute top-1/4 right-0 w-80 h-80 bg-red-100/20 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-red-50/20 rounded-full blur-3xl -z-10"></div>

    <div class="w-full max-w-5xl mx-auto px-6 custom-grid">
        {{-- Text Content --}}
        <div class="text-left order-2 lg:order-1">
            {{-- Status Badge --}}
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-maroon-soft border border-maroon-border text-maroon text-xs font-bold tracking-wide mb-6">
                <span class="w-2 h-2 rounded-full bg-maroon animate-pulse"></span>
                Tersedia untuk Magang / Kolaborasi
            </div>

            {{-- Main Title --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 leading-tight mb-4 tracking-tight">
                Hai, Saya <span class="text-maroon">{{ $profile?->name ?? config('app.name') }}</span>
            </h1>

            {{-- Tagline --}}
            <p class="text-lg font-bold text-maroon mb-6 tracking-wide">{{ $profile?->tagline }}</p>

            {{-- Bio --}}
            <p class="text-gray-600 leading-relaxed text-sm sm:text-base mb-8 font-medium">
                {{ $profile?->bio }}
            </p>

            {{-- Tech Stack --}}
            <div class="mb-8">
                <p class="text-[11px] font-bold text-gray-400 tracking-widest uppercase mb-4">Tech Stack Utama</p>
                <div class="flex flex-wrap gap-2">
                    @if($profile?->skills)
                        @foreach($profile->skills as $skill)
                            <span class="px-3 py-1.5 bg-white border border-gray-200 text-gray-500 rounded-full text-xs font-semibold shadow-sm hover:border-maroon hover:text-maroon transition duration-200">
                                {{ $skill }}
                            </span>
                        @endforeach
                    @else
                        @foreach(['Laravel', 'Filament', 'Livewire', 'Docker', 'MariaDB', 'Tailwind CSS'] as $skill)
                            <span class="px-3 py-1.5 bg-white border border-gray-200 text-gray-500 rounded-full text-xs font-semibold shadow-sm hover:border-maroon hover:text-maroon transition duration-200">
                                {{ $skill }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- CTA Buttons --}}
            <div class="custom-btn-group">
                <a href="{{ route('projects') }}"
                   class="px-6 py-3.5 bg-maroon bg-maroon-hover text-white rounded-xl text-sm font-bold shadow-md shadow-red-950/10 hover:shadow-lg transition duration-200">
                    Eksplorasi Project
                </a>
                <a href="{{ route('contact') }}"
                   class="px-6 py-3.5 bg-white border border-gray-200 hover:border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold shadow-sm transition duration-200">
                    Hubungi Saya
                </a>
                <a href="{{ $profile?->github ?? config('app.github_repo') ?? '#' }}" target="_blank"
                   class="px-6 py-3.5 bg-white border border-gray-200 hover:border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold shadow-sm transition duration-200">
                    GitHub
                </a>
                
                {{-- Komponen Livewire Kustom --}}
                <livewire:like-button />
            </div>
        </div>

        {{-- Floating Profile Card --}}
        <div class="flex justify-center order-1 lg:order-2">
            <div class="w-full max-w-[340px] bg-white rounded-3xl p-4 shadow-2xl border border-gray-100/50 flex flex-col gap-4 transform hover:scale-[1.02] transition duration-300">
                {{-- Profile Photo --}}
                <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden shadow-inner bg-gray-50 relative border border-gray-100">
                    @if($profile?->avatar)
                        <img src="{{ asset('storage/' . $profile->avatar) }}" class="w-full h-full object-cover" alt="Profile Photo">
                    @else
                        <!-- Clean Premium Placeholder -->
                        <div class="w-full h-full bg-maroon-soft flex flex-col items-center justify-center p-6 text-center">
                            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center text-4xl shadow-md mb-4 border border-red-100">👨‍💻</div>
                            <h4 class="text-base font-black text-gray-900 mb-1">{{ $profile?->name ?? config('app.name') }}</h4>
                        </div>
                    @endif
                </div>

                {{-- Campus Label Box --}}
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                    <p class="text-[10px] font-black text-maroon uppercase tracking-wider mb-1">{{ env('PORTFOLIO_CAMPUS', 'Universitas') }}</p>
                    <h3 class="text-base font-bold text-gray-900 mb-0.5">{{ env('PORTFOLIO_MAJOR', 'Program Studi') }}</h3>
                    <p class="text-xs text-gray-500 font-medium">Fokus pada Web Development</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section class="max-w-5xl mx-auto px-6 py-20">
    <div class="flex items-end justify-between mb-10">
        <div>
            <div class="inline-block px-3 py-1 rounded-full bg-maroon-soft text-maroon text-[10px] font-bold uppercase tracking-wider mb-2">Portfolio</div>
            <h2 class="text-3xl font-black text-gray-900 tracking-tight">Featured Projects</h2>
            <p class="text-gray-500 mt-1 text-sm font-medium">Beberapa project pilihan yang pernah saya kerjakan.</p>
        </div>
        <a href="{{ route('projects') }}" class="text-maroon font-bold hover:text-maroon-hover transition text-sm flex items-center gap-1">
            Lihat Semua <span class="text-xs">→</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <a href="{{ route('projects.detail', $project->slug) }}"
           class="group bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 relative
           {{ $project->is_final_project ? 'border-yellow-400/80 shadow-md shadow-yellow-100/20' : 'border-gray-200/60 hover:border-red-200' }}">
            @if($project->is_final_project)
            <div class="absolute top-3 left-3 z-10 bg-yellow-400 text-yellow-950 text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow-md">
                ⭐ Project Saya
            </div>
            @endif

            @if($project->thumbnail)
            <div class="w-full h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $project->thumbnail) }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $project->title }}">
            </div>
            @else
            <div class="w-full h-48 bg-maroon-soft flex items-center justify-center group-hover:bg-red-100/30 transition duration-300">
                <span class="text-5xl transform group-hover:scale-110 transition duration-300">
                    @if($project->slug === 'ebikes-2026') 🚲 @else 🚀 @endif
                </span>
            </div>
            @endif
            <div class="p-5">
                <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-maroon transition duration-200">
                    {{ $project->title }}
                </h3>
                <p class="text-gray-500 text-xs sm:text-sm mb-4 leading-relaxed font-medium">{{ Str::limit($project->short_description, 90) }}</p>
                <div class="flex justify-between items-center">
                    <span class="inline-block text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider
                        {{ $project->status === 'completed' ? 'bg-green-50 text-green-700 border border-green-100' :
                           ($project->status === 'on_progress' ? 'bg-blue-50 text-blue-700 border border-blue-100' : 'bg-yellow-50 text-yellow-700 border border-yellow-100') }}">
                        {{ str_replace('_', ' ', $project->status) }}
                    </span>
                    <span class="text-xs text-gray-400 font-semibold group-hover:text-maroon transition duration-200">Detail →</span>
                </div>
            </div>
        </a>
        @empty
        @endforelse
    </div>
</section>

{{-- STATS STRIP --}}
<section class="bg-maroon text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center relative z-10">
        <div class="transform hover:scale-105 transition duration-300">
            <p class="text-4xl font-black tracking-tight">{{ $profile?->skills ? count($profile->skills) : 0 }}+</p>
            <p class="text-red-200 mt-1 text-xs font-bold uppercase tracking-wider">Tech Skills</p>
        </div>
        <div class="transform hover:scale-105 transition duration-300">
            <p class="text-4xl font-black tracking-tight">{{ \App\Models\Project::count() }}</p>
            <p class="text-red-200 mt-1 text-xs font-bold uppercase tracking-wider">Total Projects</p>
        </div>
        <div class="transform hover:scale-105 transition duration-300">
            <p class="text-4xl font-black tracking-tight">{{ \App\Models\Project::where('status','completed')->count() }}</p>
            <p class="text-red-200 mt-1 text-xs font-bold uppercase tracking-wider">Completed</p>
        </div>
        <div class="transform hover:scale-105 transition duration-300">
            <p class="text-4xl font-black tracking-tight">{{ \App\Models\ContactMessage::count() }}</p>
            <p class="text-red-200 mt-1 text-xs font-bold uppercase tracking-wider">Pesan Masuk</p>
        </div>
    </div>
</section>

@endsection