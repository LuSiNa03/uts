@extends('layouts.portfolio')
@section('title', 'Contact - Portfolio')

@section('content')
<section class="py-16 sm:py-20">
    <div class="max-w-2xl mx-auto px-6">

        <div class="mb-10">
            <div class="inline-block px-3 py-1 rounded-full bg-maroon-soft text-maroon text-[10px] font-bold uppercase tracking-wider mb-2">Get In Touch</div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight mt-1">Hubungi Saya</h1>
            <p class="text-gray-500 mt-2 text-sm font-medium">Ada project, kolaborasi, atau pertanyaan? Kirim pesan di bawah ini.</p>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-4 mb-6 flex items-center gap-3">
            <span class="text-xl">✅</span>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 mb-10">
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Nama <span class="text-maroon">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-100 focus:border-maroon transition"
                               placeholder="Nama Anda">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Email <span class="text-maroon">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-100 focus:border-maroon transition"
                               placeholder="nama@email.com">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-100 focus:border-maroon transition"
                           placeholder="Kolaborasi Project">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Pesan <span class="text-maroon">*</span></label>
                    <textarea name="message" rows="5"
                              class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-100 focus:border-maroon transition resize-none"
                              placeholder="Tulis pesanmu...">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                        class="w-full bg-maroon bg-maroon-hover text-white py-3.5 rounded-xl font-bold shadow-md shadow-red-950/10 transition">
                    Kirim Pesan →
                </button>
            </form>
        </div>

        {{-- Info kontak — Stacked and Enlarged for Premium Appearance and Full Email Width --}}
        <div class="flex flex-col gap-5">
            <div class="bg-white border border-gray-200/60 rounded-3xl p-6 flex items-center gap-5 shadow-lg w-full transform hover:scale-[1.01] transition duration-200">
                <span class="text-3xl bg-maroon-soft p-4 rounded-2xl">📧</span>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-wider mb-1">Email Resmi</p>
                    <p class="font-black text-maroon text-base sm:text-lg break-all">{{ $profile?->email }}</p>
                </div>
            </div>
            
            <a href="{{ $profile?->github ?? config('app.github_repo') ?? '#' }}" target="_blank"
               class="bg-white border border-gray-200/60 rounded-3xl p-6 flex items-center gap-5 shadow-lg w-full transform hover:scale-[1.01] transition duration-200 hover:border-red-200 transition text-decoration-none">
                <span class="text-3xl bg-maroon-soft p-4 rounded-2xl">🔗</span>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-wider mb-1">GitHub Profile</p>
                    <p class="font-black text-gray-800 text-base sm:text-lg break-all">{{ str_replace(['https://','http://'], '', $profile?->github ?? config('app.github_repo') ?? '') }}</p>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection