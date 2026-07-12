<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <meta name="description" content="@yield('meta_description', 'Portfolio Website – Full Stack Web Developer')">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lucide Icons via CDN --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        maroon: {
                            DEFAULT: '#800020',
                            dark: '#5C0011',
                            light: '#C41E3A',
                            pale: 'rgba(128,0,32,0.08)',
                            muted: 'rgba(128,0,32,0.15)',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --maroon: #800020;
            --maroon-dark: #5C0011;
            --maroon-light: #C41E3A;
            --maroon-pale: rgba(128, 0, 32, 0.08);
            --maroon-border: rgba(128, 0, 32, 0.15);
            --maroon-border-strong: rgba(128, 0, 32, 0.30);
            --grad-main: linear-gradient(135deg, #800020, #C41E3A);
            --grad-dark: linear-gradient(135deg, #5C0011, #800020);
            --bg: #FFFFFF;
            --bg-soft: #FDF7F7;
            --bg-muted: #F5F0F0;
            --text: #1A1A1A;
            --text-sub: #4B1A1A;
            --text-muted: #6B7280;
            --text-faint: #9CA3AF;
            --shadow: 0 4px 24px rgba(128, 0, 32, 0.12);
            --shadow-hover: 0 8px 32px rgba(128, 0, 32, 0.22);
            --glow: 0 0 24px rgba(128, 0, 32, 0.25);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0;
        }

        /* ─── Scroll Progress Bar ─────────────────────────────── */
        #scroll-progress {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 3px;
            z-index: 9999;
            width: 0%;
            background: var(--grad-main);
            transition: width 0.1s linear;
        }

        /* ─── Navbar ─────────────────────────────────────────── */
        .portfolio-nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 50;
            transition: all 0.3s ease;
            padding: 0 1rem;
        }
        .portfolio-nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--maroon-border);
            box-shadow: 0 2px 20px rgba(128, 0, 32, 0.08);
        }
        .portfolio-nav .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .nav-logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            background: var(--grad-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
            margin: 0; padding: 0;
        }
        .nav-links a {
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--maroon);
            background: var(--maroon-pale);
            font-weight: 600;
        }
        .nav-hire-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            border-radius: 0.625rem;
            background: var(--grad-main);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: var(--glow);
            transition: all 0.2s;
        }
        .nav-hire-btn:hover { transform: scale(1.05); opacity: 0.9; }

        /* Mobile nav */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            padding: 0.5rem;
            border-radius: 0.5rem;
        }
        .mobile-menu {
            display: none;
            flex-direction: column;
            padding: 0.5rem 1rem 1rem;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--maroon-border);
        }
        .mobile-menu a {
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
            transition: color 0.2s;
        }
        .mobile-menu a:hover { color: var(--maroon); }
        .mobile-menu.open { display: flex; }

        @media (max-width: 1024px) {
            .nav-links, .nav-hire-btn { display: none !important; }
            .mobile-menu-btn { display: block; }
        }

        /* ─── Glass Card ──────────────────────────────────────── */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--maroon-border);
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(128, 0, 32, 0.07);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            box-shadow: var(--shadow);
            transform: translateY(-2px);
        }
        .glass-card.ring {
            border-color: var(--maroon-border-strong);
        }

        /* ─── Section Label ───────────────────────────────────── */
        .section-label {
            display: inline-block;
            padding: 0.375rem 1rem;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 1rem;
            background: var(--maroon-pale);
            color: var(--maroon);
            border: 1px solid var(--maroon-border);
            font-family: 'Inter', sans-serif;
        }

        /* ─── Gradient Text ───────────────────────────────────── */
        .grad-text {
            background: var(--grad-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ─── Skill Progress Bar ─────────────────────────────── */
        .skill-bar {
            height: 6px;
            border-radius: 9999px;
            background: rgba(128, 0, 32, 0.08);
            overflow: hidden;
        }
        .skill-bar-fill {
            height: 100%;
            border-radius: 9999px;
            background: var(--grad-main);
            transition: width 1s ease;
            width: 0%;
        }

        /* ─── Tag / Badge ─────────────────────────────────────── */
        .tag {
            display: inline-block;
            padding: 0.25rem 0.625rem;
            border-radius: 0.375rem;
            font-size: 0.7rem;
            font-weight: 600;
            background: var(--maroon-pale);
            color: var(--maroon);
            border: 1px solid var(--maroon-border);
            font-family: 'Inter', sans-serif;
        }

        /* ─── Timeline Dot ────────────────────────────────────── */
        .timeline-line {
            position: absolute;
            left: 20px; top: 0; bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--maroon), var(--maroon-light), transparent);
        }

        /* ─── FadeIn Animation ───────────────────────────────── */
        .fade-in-up {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ─── Tab Button ──────────────────────────────────────── */
        .tab-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            background: var(--bg-muted);
            color: var(--text-muted);
            border: 1px solid var(--maroon-border);
            cursor: pointer;
            transition: all 0.2s;
        }
        .tab-btn.active, .tab-btn:hover {
            background: var(--grad-main);
            color: #fff;
            border-color: transparent;
            box-shadow: var(--glow);
        }

        /* ─── Filter Chip ─────────────────────────────────────── */
        .filter-chip {
            padding: 0.5rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            background: var(--bg-muted);
            color: var(--text-muted);
            border: 1px solid var(--maroon-border);
            cursor: pointer;
            transition: all 0.2s;
        }
        .filter-chip.active {
            background: var(--grad-main);
            color: #fff;
            border-color: transparent;
        }

        /* ─── Back To Top ─────────────────────────────────────── */
        #back-to-top {
            position: fixed;
            bottom: 2rem; right: 2rem;
            z-index: 50;
            width: 44px; height: 44px;
            border-radius: 9999px;
            background: var(--grad-main);
            box-shadow: var(--glow);
            border: none;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        #back-to-top.visible { display: flex; }
        #back-to-top:hover { transform: scale(1.1); }

        /* ─── Hero Decorations ────────────────────────────────── */
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes spin-rev {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.6; }
        }

        /* ─── Misc ────────────────────────────────────────────── */
        .section-py { padding-top: 6rem; padding-bottom: 6rem; }
        .max-container { max-width: 1280px; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem; }
        .max-container-sm { max-width: 896px; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem; }
    </style>
    @livewireStyles
    @yield('head')
</head>
<body>
    {{-- Scroll Progress --}}
    <div id="scroll-progress"></div>

    {{-- NAVBAR --}}
    @php
        $globalProfile = \App\Models\Profile::first();
        $logoName = $globalProfile ? strtoupper(substr($globalProfile->name, 0, 3)) : 'FAB';
    @endphp
    <nav class="portfolio-nav" id="main-nav">
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="nav-logo">{{ $logoName }}.</a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}#home" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('home') }}#about">About</a></li>
                <li><a href="{{ route('home') }}#skills">Skills</a></li>
                <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">Portfolio</a></li>
                <li><a href="{{ route('home') }}#experience">Experience</a></li>
                <li><a href="{{ route('home') }}#education">Education</a></li>
                <li><a href="{{ route('home') }}#blog">Blog</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <a href="{{ route('contact') }}" class="nav-hire-btn">
                Hire Me <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
            </a>
            <button class="mobile-menu-btn" id="mobile-menu-toggle" aria-label="Toggle menu">
                <i data-lucide="menu" style="width:20px;height:20px" id="menu-icon"></i>
            </button>
        </div>
        <div class="mobile-menu" id="mobile-menu">
            <a href="{{ route('home') }}#home">Home</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#skills">Skills</a>
            <a href="{{ route('projects') }}">Portfolio</a>
            <a href="{{ route('home') }}#experience">Experience</a>
            <a href="{{ route('home') }}#education">Education</a>
            <a href="{{ route('home') }}#blog">Blog</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </nav>

    {{-- Main Content --}}
    <main style="padding-top: 64px;">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer style="border-top: 1px solid var(--maroon-border); background: var(--bg); padding: 3rem 0 2rem;">
        <div class="max-container">
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2.5rem; margin-bottom: 2.5rem;">
                <div>
                    <p style="font-family: Poppins, sans-serif; font-weight: 800; font-size: 1.5rem; margin-bottom: 0.75rem;" class="grad-text">{{ $logoName }}.</p>
                    <p style="font-family: Inter, sans-serif; font-size: 0.875rem; color: var(--text-muted); line-height: 1.6;">
                        {{ $globalProfile?->tagline ?? 'Full Stack Web Developer' }}. Building digital experiences that matter.
                    </p>
                </div>
                <div>
                    <p style="font-family: Poppins, sans-serif; font-weight: 600; font-size: 0.875rem; margin-bottom: 1rem; color: var(--text);">Quick Links</p>
                    <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.5rem;">
                        <li><a href="{{ route('home') }}#home" style="font-size:0.875rem; color:var(--text-muted); text-decoration:none; transition:color .2s;" onmouseover="this.style.color='var(--maroon)'" onmouseout="this.style.color='var(--text-muted)'">Home</a></li>
                        <li><a href="{{ route('projects') }}" style="font-size:0.875rem; color:var(--text-muted); text-decoration:none; transition:color .2s;" onmouseover="this.style.color='var(--maroon)'" onmouseout="this.style.color='var(--text-muted)'">Portfolio</a></li>
                        <li><a href="{{ route('contact') }}" style="font-size:0.875rem; color:var(--text-muted); text-decoration:none; transition:color .2s;" onmouseover="this.style.color='var(--maroon)'" onmouseout="this.style.color='var(--text-muted)'">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <p style="font-family: Poppins, sans-serif; font-weight: 600; font-size: 0.875rem; margin-bottom: 1rem; color: var(--text);">Connect</p>
                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                        @if($globalProfile?->github)
                        <a href="{{ $globalProfile->github }}" target="_blank" aria-label="GitHub"
                           style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:all .2s;"
                           onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            <i data-lucide="github" style="width:16px;height:16px;"></i>
                        </a>
                        @endif
                        @if($globalProfile?->email)
                        <a href="mailto:{{ $globalProfile->email }}" aria-label="Email"
                           style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:all .2s;"
                           onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            <i data-lucide="mail" style="width:16px;height:16px;"></i>
                        </a>
                        @endif
                        @if($globalProfile?->linkedin)
                        <a href="{{ $globalProfile->linkedin }}" target="_blank" aria-label="LinkedIn"
                           style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:all .2s;"
                           onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            <i data-lucide="linkedin" style="width:16px;height:16px;"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid var(--maroon-border); padding-top:1.5rem; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:1rem;">
                <p style="font-size:0.75rem; color:var(--text-faint); font-family:Inter,sans-serif;">© {{ date('Y') }} {{ $globalProfile?->name ?? config('app.name') }}. All rights reserved.</p>
                <p style="font-size:0.75rem; color:var(--text-faint); font-family:Inter,sans-serif;">Built with <span style="color:var(--maroon)">❤</span> using Laravel, Filament & Docker</p>
            </div>
        </div>
    </footer>

    {{-- Back To Top --}}
    <button id="back-to-top" aria-label="Back to top">
        <i data-lucide="chevron-up" style="width:20px;height:20px;color:white;"></i>
    </button>

    <script>
        // Init Lucide Icons
        lucide.createIcons();

        // Scroll Progress Bar
        const progressBar = document.getElementById('scroll-progress');
        const nav = document.getElementById('main-nav');
        const backToTop = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            const total = document.documentElement.scrollHeight - window.innerHeight;
            const pct = total > 0 ? (window.scrollY / total) * 100 : 0;
            progressBar.style.width = pct + '%';

            // Nav scroll class
            if (window.scrollY > 40) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            // Back to top
            if (window.scrollY > 400) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        // Back to top click
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const isOpen = mobileMenu.classList.contains('open');
            menuIcon.setAttribute('data-lucide', isOpen ? 'x' : 'menu');
            lucide.createIcons();
        });

        // FadeIn on scroll (IntersectionObserver)
        const fadeEls = document.querySelectorAll('.fade-in-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => entry.target.classList.add('visible'), parseInt(delay));
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        fadeEls.forEach(el => observer.observe(el));

        // Skill bar animation
        const skillBars = document.querySelectorAll('.skill-bar-fill[data-level]');
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const level = entry.target.dataset.level;
                    setTimeout(() => { entry.target.style.width = level + '%'; }, 200);
                    skillObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        skillBars.forEach(bar => skillObserver.observe(bar));
    </script>

    @livewireScripts
    @yield('scripts')
</body>
</html>