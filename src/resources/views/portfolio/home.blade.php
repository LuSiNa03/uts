@extends('layouts.portfolio')
@section('title', 'Home - Portfolio')

@section('content')

{{-- HERO --}}
<section class="min-h-screen flex items-center bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-16">
        {{-- Text --}}
        <div class="flex-1 text-center md:text-left">
            <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-widest">
                Open to Work
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
                Hi, I'm<br>
                <span class="text-blue-700">{{ $profile?->name ?? 'Nama Kamu' }}</span>
            </h1>
            <p class="text-xl text-gray-500 mb-6 font-medium">{{ $profile?->tagline ?? 'Full Stack Developer' }}</p>
            <p class="text-gray-600 leading-relaxed mb-8 max-w-lg">
                {{ $profile?->bio ?? 'Bio singkat kamu di sini.' }}
            </p>

            {{-- Skills --}}
            @if($profile?->skills)
            <div class="flex flex-wrap gap-2 mb-8 justify-center md:justify-start">
                @foreach($profile->skills as $skill)
                <span class="px-3 py-1 bg-white border border-blue-200 text-blue-700 rounded-full text-sm font-medium shadow-sm">
                    {{ $skill }}
                </span>
                @endforeach
            </div>
            @endif

            <div class="flex gap-4 justify-center md:justify-start">
                <a href="{{ route('projects') }}"
                   class="px-6 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-lg font-semibold shadow-md transition">
                    Lihat Projects
                </a>
                <a href="{{ route('contact') }}"
                   class="px-6 py-3 border-2 border-blue-700 text-blue-700 hover:bg-blue-50 rounded-lg font-semibold transition">
                    Hubungi Saya
                </a>
                @if($profile?->github)
                <a href="{{ $profile->github }}" target="_blank"
                   class="px-6 py-3 border border-gray-300 text-gray-600 hover:bg-gray-50 rounded-lg font-semibold transition">
                    GitHub
                </a>
                @endif
            </div>
        </div>

        {{-- Avatar --}}
        <div class="flex-shrink-0">
            @if($profile?->avatar)
            <img src="{{ asset('storage/' . $profile->avatar) }}"
                 class="w-56 h-56 rounded-2xl object-cover shadow-xl border-4 border-white" alt="Avatar">
            @else
            <div class="w-56 h-56 rounded-2xl bg-gradient-to-br from-blue-100 to-indigo-200 flex items-center justify-center shadow-xl">
                <span class="text-7xl">👤</span>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Featured Projects</h2>
            <p class="text-gray-500 mt-1">Beberapa project pilihan yang pernah saya kerjakan.</p>
        </div>
        <a href="{{ route('projects') }}" class="text-blue-700 font-semibold hover:underline text-sm">
            Lihat Semua →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <a href="{{ route('projects.detail', $project->slug) }}"
           class="group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:border-blue-300 transition duration-300">
            @if($project->thumbnail)
            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                 class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                <span class="text-5xl">🚀</span>
            </div>
            @endif
            <div class="p-5">
                <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-blue-700 transition">
                    {{ $project->title }}
                </h3>
                <p class="text-gray-500 text-sm mb-3">{{ Str::limit($project->short_description, 90) }}</p>
                <span class="inline-block text-xs px-2 py-1 rounded-full font-medium
                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' :
                       ($project->status === 'on_progress' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700') }}">
                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                </span>
            </div>
        </a>
        @empty
        <p class="text-gray-400 col-span-3 text-center py-10">Belum ada project.</p>
        @endforelse
    </div>
</section>

{{-- STATS / ABOUT STRIP --}}
<section class="bg-blue-700 text-white py-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <p class="text-4xl font-extrabold">{{ $profile?->skills ? count($profile->skills) : 0 }}+</p>
            <p class="text-blue-200 mt-1 text-sm">Tech Skills</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold">{{ \App\Models\Project::count() }}</p>
            <p class="text-blue-200 mt-1 text-sm">Total Projects</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold">{{ \App\Models\Project::where('status','completed')->count() }}</p>
            <p class="text-blue-200 mt-1 text-sm">Completed</p>
        </div>
        <div>
            <p class="text-4xl font-extrabold">{{ \App\Models\ContactMessage::count() }}</p>
            <p class="text-blue-200 mt-1 text-sm">Pesan Masuk</p>
        </div>
    </div>
</section>

@endsection