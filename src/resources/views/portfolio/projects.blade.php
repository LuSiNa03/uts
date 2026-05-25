@extends('layouts.portfolio')
@section('title', 'Projects - Portfolio')

@section('content')
<section class="py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="mb-12">
            <div class="inline-block px-3 py-1 rounded-full bg-maroon-soft text-maroon text-[10px] font-bold uppercase tracking-wider mb-2">Portofolio</div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight mt-1">My Projects</h1>
            <p class="text-gray-500 mt-2 text-sm font-medium">Semua project yang pernah & sedang saya kerjakan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                    <div class="flex items-center justify-between">
                        <span class="inline-block text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider
                            {{ $project->status === 'completed' ? 'bg-green-50 text-green-700 border border-green-100' :
                               ($project->status === 'on_progress' ? 'bg-blue-50 text-blue-700 border border-blue-100' : 'bg-yellow-50 text-yellow-700 border border-yellow-100') }}">
                            {{ str_replace('_', ' ', $project->status) }}
                        </span>
                        <span class="text-xs text-gray-400 font-bold group-hover:text-maroon transition duration-200">Detail →</span>
                    </div>
                </div>
            </a>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection