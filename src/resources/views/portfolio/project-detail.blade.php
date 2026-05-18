@extends('layouts.portfolio')
@section('title', $project->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16">

    {{-- Back --}}
    <a href="{{ route('projects') }}" class="text-indigo-400 hover:underline mb-6 inline-block">
        ← Kembali ke Projects
    </a>

    {{-- Header --}}
    <div class="mb-8">
        @if($project->is_final_project)
        <span class="bg-yellow-500 text-black text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">
            ⭐ Final Project Report
        </span>
        @endif
        <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>
        <p class="text-gray-300 text-lg mb-4">{{ $project->short_description }}</p>
        <div class="flex gap-3 flex-wrap">
            <span class="px-3 py-1 rounded-full text-sm
                {{ $project->status === 'completed' ? 'bg-green-900 text-green-300' :
                   ($project->status === 'on_progress' ? 'bg-blue-900 text-blue-300' : 'bg-yellow-900 text-yellow-300') }}">
                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
            </span>
            @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank"
               class="px-3 py-1 rounded-full text-sm bg-gray-700 hover:bg-gray-600 transition">
                🔗 GitHub
            </a>
            @endif
            @if($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank"
               class="px-3 py-1 rounded-full text-sm bg-indigo-700 hover:bg-indigo-600 transition">
                🚀 Live Demo
            </a>
            @endif
        </div>
    </div>

    {{-- Thumbnail --}}
    @if($project->thumbnail)
    <img src="{{ asset('storage/' . $project->thumbnail) }}"
         class="w-full rounded-xl mb-10 max-h-80 object-cover" alt="{{ $project->title }}">
    @endif

    {{-- LAPORAN AKHIR SECTION — hanya tampil jika is_final_project --}}
    @if($project->is_final_project)

    {{-- Analisis Masalah --}}
    @if($project->problem_analysis)
    <div class="bg-gray-900 rounded-xl p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-indigo-400">📋 Analisis Masalah & Kebutuhan Sistem</h2>
        <div class="prose prose-invert max-w-none text-gray-300">
            {!! $project->problem_analysis !!}
        </div>
    </div>
    @endif

    {{-- Kebutuhan Sistem --}}
    @if($project->system_requirements)
    <div class="bg-gray-900 rounded-xl p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-indigo-400">⚙️ Kebutuhan Sistem & Fitur Utama</h2>
        <div class="prose prose-invert max-w-none text-gray-300">
            {!! $project->system_requirements !!}
        </div>
    </div>
    @endif

    {{-- Tech Stack --}}
    @if($project->tech_stack_explanation)
    <div class="bg-gray-900 rounded-xl p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-indigo-400">🛠️ Arsitektur & Tech Stack</h2>
        <div class="prose prose-invert max-w-none text-gray-300">
            {!! $project->tech_stack_explanation !!}
        </div>
    </div>
    @endif

    {{-- Diagram --}}
    @if($project->erd_image || $project->flowchart_image)
    <div class="bg-gray-900 rounded-xl p-6 mb-6">
        <h2 class="text-2xl font-bold mb-6 text-indigo-400">📊 Rancangan Sistem</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($project->erd_image)
            <div>
                <h3 class="font-semibold mb-3 text-gray-300">Entity Relationship Diagram (ERD)</h3>
                <img src="{{ asset('storage/' . $project->erd_image) }}"
                     class="w-full rounded-lg border border-gray-700" alt="ERD">
            </div>
            @endif
            @if($project->flowchart_image)
            <div>
                <h3 class="font-semibold mb-3 text-gray-300">Flowchart Sistem</h3>
                <img src="{{ asset('storage/' . $project->flowchart_image) }}"
                     class="w-full rounded-lg border border-gray-700" alt="Flowchart">
            </div>
            @endif
        </div>
    </div>
    @endif

    @endif {{-- end is_final_project --}}

</div>
@endsection