@extends('layouts.portfolio')
@section('title', $project->title . ' - Project Detail')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">

    {{-- Back Link --}}
    <a href="{{ route('projects') }}" class="text-maroon hover:text-maroon-hover font-bold text-sm mb-6 inline-flex items-center gap-1 transition">
        ← Kembali ke Projects
    </a>

    {{-- Header --}}
    <div class="mb-10">
        @if($project->is_final_project)
        <span class="inline-block bg-yellow-400 text-yellow-950 text-[10px] font-black uppercase tracking-wider px-3 py-1 rounded-full shadow-sm mb-3">
            ⭐ Final Project Report
        </span>
        @endif
        <h1 class="text-3xl sm:text-4xl font-black text-gray-900 leading-tight mb-3 tracking-tight">{{ $project->title }}</h1>
        <p class="text-gray-600 text-base sm:text-lg mb-4 font-medium">{{ $project->short_description }}</p>
        
        <div class="flex gap-2 flex-wrap items-center">
            <span class="inline-block text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider
                {{ $project->status === 'completed' ? 'bg-green-50 text-green-700 border border-green-100' :
                   ($project->status === 'on_progress' ? 'bg-blue-50 text-blue-700 border border-blue-100' : 'bg-yellow-50 text-yellow-700 border border-yellow-100') }}">
                {{ str_replace('_', ' ', $project->status) }}
            </span>
            @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
               class="px-3.5 py-1 bg-white border border-gray-200 hover:border-gray-300 text-gray-600 rounded-full text-xs font-bold transition flex items-center gap-1 shadow-sm">
                🔗 GitHub
            </a>
            @endif
            @if($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank"
               class="px-3.5 py-1 bg-maroon bg-maroon-hover text-white rounded-full text-xs font-bold transition flex items-center gap-1 shadow-sm">
                🚀 Live Demo
            </a>
            @endif
        </div>
    </div>

    {{-- Thumbnail --}}
    @if($project->thumbnail)
    <div class="w-full rounded-2xl overflow-hidden shadow-lg border border-gray-100 mb-10 max-h-96">
        <img src="{{ asset('storage/' . $project->thumbnail) }}"
             class="w-full h-full object-cover" alt="{{ $project->title }}">
    </div>
    @endif

    {{-- LAPORAN AKHIR SECTION — hanya tampil jika is_final_project --}}
    @if($project->is_final_project)

        {{-- Analisis Masalah --}}
        @if($project->problem_analysis)
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-8 mb-6">
            <h2 class="text-xl font-black mb-4 text-maroon flex items-center gap-2">📋 Analisis Masalah & Kebutuhan Sistem</h2>
            <div class="prose max-w-none text-gray-600 font-medium leading-relaxed text-sm sm:text-base">
                {!! $project->problem_analysis !!}
            </div>
        </div>
        @endif

        {{-- Kebutuhan Sistem --}}
        @if($project->system_requirements)
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-8 mb-6">
            <h2 class="text-xl font-black mb-4 text-maroon flex items-center gap-2">⚙️ Kebutuhan Sistem & Fitur Utama</h2>
            <div class="prose max-w-none text-gray-600 font-medium leading-relaxed text-sm sm:text-base">
                {!! $project->system_requirements !!}
            </div>
        </div>
        @endif

        {{-- Tech Stack --}}
        @if($project->tech_stack_explanation)
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-8 mb-6">
            <h2 class="text-xl font-black mb-4 text-maroon flex items-center gap-2">🛠️ Arsitektur & Tech Stack</h2>
            <div class="prose max-w-none text-gray-600 font-medium leading-relaxed text-sm sm:text-base">
                {!! $project->tech_stack_explanation !!}
            </div>
        </div>
        @endif

        {{-- Diagram --}}
        @if($project->erd_image || $project->flowchart_image)
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-8 mb-6">
            <h2 class="text-xl font-black mb-6 text-maroon flex items-center gap-2">📊 Rancangan Sistem</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if($project->erd_image)
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-sm">Entity Relationship Diagram (ERD)</h3>
                    <div class="rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                        <img src="{{ asset('storage/' . $project->erd_image) }}"
                             class="w-full object-contain bg-gray-50" alt="ERD">
                    </div>
                </div>
                @endif
                @if($project->flowchart_image)
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-sm">Flowchart Sistem</h3>
                    <div class="rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                        <img src="{{ asset('storage/' . $project->flowchart_image) }}"
                             class="w-full object-contain bg-gray-50" alt="Flowchart">
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

    @endif {{-- end is_final_project --}}

</div>
@endsection