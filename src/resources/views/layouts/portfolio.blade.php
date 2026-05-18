<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 font-sans antialiased">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md border-b border-gray-200 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700 tracking-tight">
                Portofolio
            </a>
            <div class="flex gap-8 text-sm font-medium text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-700 transition">Home</a>
                <a href="{{ route('projects') }}" class="hover:text-blue-700 transition">Projects</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-700 transition">Contact</a>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="bg-gray-50 border-t border-gray-200 mt-20">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="font-bold text-blue-700">Portofolio</span>
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} — Dibangun dengan Laravel & Filament</p>
            <div class="flex gap-4 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-blue-700 transition">Home</a>
                <a href="{{ route('projects') }}" class="hover:text-blue-700 transition">Projects</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-700 transition">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>