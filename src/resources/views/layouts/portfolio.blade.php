<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: {
                            DEFAULT: '#800000',
                            soft: '#fff5f5',
                            border: '#ffd1d1',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --maroon: #800000;
            --maroon-hover: #600000;
            --maroon-soft: #fff5f5;
            --maroon-border: #ffd1d1;
            --offwhite: #FAF9F6;
        }
        .bg-maroon { background-color: var(--maroon) !important; }
        .bg-maroon-hover:hover { background-color: var(--maroon-hover) !important; }
        .bg-maroon-soft { background-color: var(--maroon-soft) !important; }
        .bg-offwhite { background-color: var(--offwhite) !important; }
        
        .text-maroon { color: var(--maroon) !important; }
        .text-maroon-hover:hover { color: var(--maroon-hover) !important; }
        
        .border-maroon { border-color: var(--maroon) !important; }
        .border-maroon-border { border-color: var(--maroon-border) !important; }

        /* Custom Robust Spacing & Layout independent of Tailwind compiling */
        .custom-header {
            position: fixed;
            top: 16px;
            left: 0;
            right: 0;
            z-index: 50;
            display: flex;
            justify-content: center;
            padding: 0 16px;
            box-sizing: border-box;
        }
        .custom-nav {
            width: 100%;
            max-width: 1024px;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid #f3f4f6;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            padding: 12px 24px;
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            box-sizing: border-box;
        }
        .custom-logo {
            font-size: 20px;
            font-weight: 900;
            color: var(--maroon) !important;
            text-decoration: none;
            letter-spacing: -0.025em;
        }
        .custom-menu {
            display: flex !important;
            align-items: center !important;
            gap: 28px !important;
        }
        .custom-menu a {
            font-size: 14px;
            font-weight: 700;
            color: #4b5563;
            text-decoration: none;
            transition: color 0.2s;
        }
        .custom-menu a:hover, .custom-menu a.active {
            color: var(--maroon) !important;
        }
        .custom-btn {
            background-color: var(--maroon) !important;
            color: white !important;
            font-weight: 700;
            font-size: 13px;
            padding: 8px 18px;
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(128, 0, 0, 0.15);
            transition: all 0.2s;
            display: inline-block;
        }
        .custom-btn:hover {
            background-color: var(--maroon-hover) !important;
            transform: translateY(-1px);
        }

        /* Responsive Grid for Hero */
        .custom-grid {
            display: grid !important;
            grid-template-columns: 1fr !important;
            gap: 40px !important;
            align-items: center !important;
            box-sizing: border-box;
        }
        @media (min-width: 1024px) {
            .custom-grid {
                grid-template-columns: 7fr 5fr !important;
                gap: 60px !important;
            }
        }
        
        /* Flex Buttons with robust spacing */
        .custom-btn-group {
            display: flex !important;
            flex-wrap: wrap !important;
            gap: 16px !important;
            justify-content: flex-start !important;
            align-items: center !important;
        }
    </style>
</head>
<body class="bg-offwhite text-gray-800 font-sans antialiased">

    {{-- NAVBAR --}}
    <div class="custom-header">
        <nav class="custom-nav">
            <a href="{{ route('home') }}" class="custom-logo">
                &lt;FadhilAfiq /&gt;
            </a>
            <div class="custom-menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a>
            </div>
            <div>
                <a href="{{ route('contact') }}" class="custom-btn">
                    Hire Me
                </a>
            </div>
        </nav>
    </div>

    {{-- Main content pushed down to 140px to completely avoid overlapping --}}
    <main style="padding-top: 140px !important; box-sizing: border-box;">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 mt-20">
        <div class="max-w-5xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="font-black text-maroon">&lt;FadhilAfiq /&gt;</span>
            <p class="text-gray-400 text-xs sm:text-sm">&copy; {{ date('Y') }} — Dibangun dengan Laravel, Filament & Docker</p>
            <div class="flex gap-6 text-sm font-medium text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-maroon transition">Home</a>
                <a href="{{ route('projects') }}" class="hover:text-maroon transition">Projects</a>
                <a href="{{ route('contact') }}" class="hover:text-maroon transition">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>