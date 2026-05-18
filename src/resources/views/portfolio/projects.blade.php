@extends('layouts.portfolio')
@section('title', 'Projects')

@section('content')
<section class="bg-gradient-to-b from-blue-50 to-white py-20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-12">
            <span class="text-blue-700 font-semibold text-sm uppercase tracking-widest">Portofolio</span>
            <h1 class="text-4xl font-extrabold text-gray-900 mt-2">My Projects</h1>
            <p class="text-gray-500 mt-2">Semua project yang pernah & sedang saya kerjakan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
            <a href="{{ route('projects.detail', $project->slug) }}"
               class="group bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 relative
               {{ $project->is_final_project ? 'border-yellow-400' : 'border-gray-200 hover:border-blue-300' }}">

                @if($project->is_final_project)
                <div class="absolute top-3 left-3 z-10 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full">
                    ⭐ Final Project
                </div>
                @endif

                @if($project->thumbnail)
                <img src="{{ asset('storage/' . $project->thumbnail) }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                    <span class="text-5xl">💻</span>
                </div>
                @endif

                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-blue-700 transition">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-500 text-sm mb-4">{{ Str::limit($project->short_description, 90) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs px-3 py-1 rounded-full font-medium
                            {{ $project->status === 'completed' ? 'bg-green-100 text-green-700' :
                               ($project->status === 'on_progress' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700') }}">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                        <span class="text-blue-700 text-sm font-medium">Detail →</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-20 text-gray-400">
                <p class="text-5xl mb-4">📂</p>
                <p>Belum ada project.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection