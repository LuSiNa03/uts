@extends('layouts.portfolio')
@section('title', 'Contact')

@section('content')
<section class="bg-gradient-to-b from-blue-50 to-white min-h-screen py-20">
    <div class="max-w-2xl mx-auto px-6">

        <div class="mb-10">
            <span class="text-blue-700 font-semibold text-sm uppercase tracking-widest">Get In Touch</span>
            <h1 class="text-4xl font-extrabold text-gray-900 mt-2">Hubungi Saya</h1>
            <p class="text-gray-500 mt-2">Ada project, kolaborasi, atau pertanyaan? Kirim pesan di bawah ini.</p>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-300 text-green-700 rounded-xl px-5 py-4 mb-6 flex items-center gap-3">
            <span class="text-xl">✅</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                               placeholder="John Doe">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                               placeholder="john@email.com">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Kolaborasi Project">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pesan <span class="text-red-500">*</span></label>
                    <textarea name="message" rows="5"
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                              placeholder="Tulis pesanmu...">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                        class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold shadow-md transition">
                    Kirim Pesan →
                </button>
            </form>
        </div>

        {{-- Info kontak --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            @if($profile?->email ?? false)
            <div class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3">
                <span class="text-2xl">📧</span>
                <div>
                    <p class="text-xs text-gray-500">Email</p>
                    <p class="font-medium text-gray-800">{{ $profile->email }}</p>
                </div>
            </div>
            @endif
            @if($profile?->github ?? false)
            <a href="{{ $profile->github }}" target="_blank"
               class="bg-white border border-gray-200 rounded-xl p-4 flex items-center gap-3 hover:border-blue-300 transition">
                <span class="text-2xl">🔗</span>
                <div>
                    <p class="text-xs text-gray-500">GitHub</p>
                    <p class="font-medium text-gray-800">Lihat Profile</p>
                </div>
            </a>
            @endif
        </div>
    </div>
</section>
@endsection