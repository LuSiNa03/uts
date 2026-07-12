@extends('layouts.portfolio')
@section('title', ($profile?->name ?? 'Portfolio') . ' – Full Stack Web Developer')
@section('meta_description', $profile?->bio ?? 'Portfolio website Full Stack Web Developer.')

@section('head')
<style>
/* ─── Hero Section ─────────────────────────────────────────────────────────── */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    padding: 5rem 1.5rem 4rem;
    background: linear-gradient(160deg, #FFF5F5 0%, #FFFFFF 50%, #FDF0F0 100%);
}
.hero-bg-glow-1 {
    position: absolute;
    top: -8rem; left: -8rem;
    width: 24rem; height: 24rem;
    border-radius: 50%;
    background: radial-gradient(circle, #C41E3A, transparent);
    opacity: 0.22;
    filter: blur(60px);
    pointer-events: none;
}
.hero-bg-glow-2 {
    position: absolute;
    top: 30%; right: -12rem;
    width: 32rem; height: 32rem;
    border-radius: 50%;
    background: radial-gradient(circle, #800020, transparent);
    opacity: 0.14;
    filter: blur(70px);
    pointer-events: none;
}
.hero-dot-grid {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(128,0,32,0.06) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
}
.hero-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 3rem;
    align-items: center;
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
@media (min-width: 1024px) {
    .hero-grid { grid-template-columns: 1fr 1fr; gap: 4rem; }
}

/* ─── Avatar Circle ─────────────────────────────────────── */
.avatar-wrap {
    position: relative;
    width: 18rem; height: 18rem;
    margin: 0 auto;
}
@media (min-width: 1024px) { .avatar-wrap { width: 20rem; height: 20rem; } }
.avatar-ring-1 {
    position: absolute; inset: 0;
    border-radius: 50%;
    border: 2px dashed #C41E3A;
    opacity: 0.25;
    animation: spin 22s linear infinite;
}
.avatar-ring-2 {
    position: absolute; inset: -1.25rem;
    border-radius: 50%;
    border: 2px dashed #800020;
    opacity: 0.15;
    animation: spin 35s linear infinite reverse;
}
.avatar-glow {
    position: absolute; inset: 0.75rem;
    border-radius: 50%;
    background: radial-gradient(circle, #C41E3A, #800020, transparent);
    opacity: 0.25;
    filter: blur(24px);
}
.avatar-circle {
    position: absolute; inset: 1.5rem;
    border-radius: 50%;
    overflow: hidden;
    background: var(--grad-main);
    display: flex; align-items: center; justify-content: center;
    border: 3px solid transparent;
}
.avatar-initials {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5rem;
    font-weight: 800;
    color: #fff;
    user-select: none;
}
.avatar-badge {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    background: rgba(255,255,255,0.95);
    border: 1px solid var(--maroon-border);
    color: var(--text);
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 12px rgba(128,0,32,0.12);
    white-space: nowrap;
}

/* ─── Scroll cue ────────────────────────────────────────── */
.scroll-cue {
    position: absolute;
    bottom: 2rem; left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    opacity: 0.4;
}

/* ─── Rotating subtitle ─────────────────────────────────── */
.subtitle-rotator span {
    display: block;
    animation: slideUp 0.4s ease;
}
@keyframes slideUp {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ─── About Section ─────────────────────────────────────── */
.about-section { background: var(--bg-soft); }
.about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}
@media (min-width: 1024px) { .about-grid { grid-template-columns: 1fr 1fr; } }

/* ─── Skills Section ─────────────────────────────────────── */
.skills-section { background: var(--bg); }
.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
}

/* ─── Portfolio Section ──────────────────────────────────── */
.portfolio-section { background: var(--bg-soft); }
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

/* ─── Experience Section ─────────────────────────────────── */
.exp-section { background: var(--bg); }
.exp-item { position: relative; display: flex; gap: 2rem; margin-bottom: 2.5rem; padding-left: 4rem; }
.exp-dot {
    position: absolute; left: 0; top: 4px;
    width: 40px; height: 40px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    border: 4px solid var(--bg);
}

/* ─── Stats Strip ────────────────────────────────────────── */
.stats-section {
    background: var(--grad-main);
    position: relative;
    overflow: hidden;
    padding: 4rem 1.5rem;
}
.stats-dot-bg {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px);
    background-size: 20px 20px;
}
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
    text-align: center;
    position: relative; z-index: 1;
    max-width: 1280px; margin: 0 auto;
}
@media (min-width: 768px) { .stats-grid { grid-template-columns: repeat(4, 1fr); } }

/* ─── Certificates Section ───────────────────────────────── */
.certs-section { background: var(--bg-soft); }
.certs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.5rem;
}

/* ─── Education Section ──────────────────────────────────── */
.edu-section { background: var(--bg); }

/* ─── Achievements Section ───────────────────────────────── */
.ach-section { background: var(--bg-soft); }
.ach-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.25rem;
}

/* ─── Blog Section ───────────────────────────────────────── */
.blog-section { background: var(--bg); }
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}

/* ─── Contact Section ────────────────────────────────────── */
.contact-section { background: var(--bg-soft); }
.contact-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}
@media (min-width: 1024px) { .contact-grid { grid-template-columns: 2fr 3fr; } }

.contact-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--maroon-border);
    border-radius: 0.75rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    color: var(--text);
    background: var(--bg-muted);
    outline: none;
    transition: border-color 0.2s;
}
.contact-input:focus {
    border-color: var(--maroon-border-strong);
    box-shadow: 0 0 0 3px var(--maroon-pale);
}
</style>
@endsection

@section('content')

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- HERO SECTION                                               --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="hero-section" id="home">
    <div class="hero-bg-glow-1"></div>
    <div class="hero-bg-glow-2"></div>
    <div class="hero-dot-grid"></div>

    <div class="hero-grid">
        {{-- Left: Text --}}
        <div class="fade-in-up" data-delay="0">
            <span class="section-label">
                <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--maroon);margin-right:6px;animation:pulse-dot 2s infinite;"></span>
                👋 Welcome to my portfolio
            </span>
            <h1 style="font-family:'Poppins',sans-serif;font-weight:900;font-size:clamp(2.2rem,5vw,3.8rem);line-height:1.1;margin-bottom:0.75rem;color:var(--text);">
                Hi, I'm<br>
                <span class="grad-text">{{ $profile?->name ?? config('app.name') }}</span>
            </h1>
            <div class="subtitle-rotator" style="height:2rem;overflow:hidden;margin-bottom:1.5rem;">
                <span style="font-size:1.1rem;font-weight:600;color:var(--maroon);font-family:'Inter',sans-serif;" id="hero-subtitle">
                    {{ $profile?->tagline ?? 'Full Stack Web Developer' }}
                </span>
            </div>
            <p style="font-family:'Inter',sans-serif;font-size:1rem;line-height:1.8;color:var(--text-muted);max-width:38rem;margin-bottom:2rem;">
                {{ $profile?->bio ?? 'Passionate about building robust, scalable web applications and exploring the frontiers of software engineering.' }}
            </p>
            <div style="display:flex;flex-wrap:wrap;gap:1rem;margin-bottom:2rem;">
                <a href="{{ route('projects') }}"
                   style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.75rem 1.5rem;border-radius:0.75rem;background:var(--grad-main);color:#fff;font-family:'Inter',sans-serif;font-size:0.875rem;font-weight:600;text-decoration:none;box-shadow:var(--glow);transition:transform .2s;"
                   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <i data-lucide="folder-open" style="width:16px;height:16px;"></i> Lihat Projects
                </a>
                <a href="{{ route('contact') }}"
                   style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.75rem 1.5rem;border-radius:0.75rem;border:1.5px solid var(--maroon-border-strong);color:var(--maroon);background:var(--maroon-pale);font-family:'Inter',sans-serif;font-size:0.875rem;font-weight:600;text-decoration:none;transition:transform .2s;"
                   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <i data-lucide="mail" style="width:16px;height:16px;"></i> Hubungi Saya
                </a>
            </div>
            <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2.5rem;">
                @if($profile?->github)
                <a href="{{ $profile->github }}" target="_blank" aria-label="GitHub"
                   style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:transform .2s;"
                   onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <i data-lucide="github" style="width:16px;height:16px;"></i>
                </a>
                @endif
                @if($profile?->linkedin)
                <a href="{{ $profile->linkedin }}" target="_blank" aria-label="LinkedIn"
                   style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:transform .2s;"
                   onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <i data-lucide="linkedin" style="width:16px;height:16px;"></i>
                </a>
                @endif
                @if($profile?->email)
                <a href="mailto:{{ $profile->email }}" aria-label="Email"
                   style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);color:var(--maroon);transition:transform .2s;"
                   onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <i data-lucide="mail" style="width:16px;height:16px;"></i>
                </a>
                @endif
            </div>
            <div style="display:flex;align-items:center;gap:2.5rem;">
                <div>
                    <p style="font-family:'Poppins',sans-serif;font-size:1.5rem;font-weight:800;" class="grad-text">{{ \App\Models\Project::count() }}+</p>
                    <p style="font-size:0.75rem;color:var(--text-muted);font-family:'Inter',sans-serif;">Projects</p>
                </div>
                <div>
                    <p style="font-family:'Poppins',sans-serif;font-size:1.5rem;font-weight:800;" class="grad-text">{{ $skills ? count($skills) : 6 }}+</p>
                    <p style="font-size:0.75rem;color:var(--text-muted);font-family:'Inter',sans-serif;">Tech Skills</p>
                </div>
                <div>
                    <p style="font-family:'Poppins',sans-serif;font-size:1.5rem;font-weight:800;" class="grad-text">{{ $certificates ? count($certificates) : 0 }}+</p>
                    <p style="font-size:0.75rem;color:var(--text-muted);font-family:'Inter',sans-serif;">Certificates</p>
                </div>
            </div>
        </div>

        {{-- Right: Avatar --}}
        <div class="fade-in-up" data-delay="180" style="display:flex;justify-content:center;">
            <div class="avatar-wrap">
                <div class="avatar-ring-1"></div>
                <div class="avatar-ring-2"></div>
                <div class="avatar-glow"></div>
                <div class="avatar-circle">
                    @if($profile?->avatar)
                        <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <span class="avatar-initials">
                            {{ strtoupper(collect(explode(' ', $profile?->name ?? 'FA'))->take(2)->map(fn($w) => $w[0])->join('')) }}
                        </span>
                    @endif
                </div>
                {{-- Floating Badges --}}
                @php
                    $badgeStyles = [
                        'top:5%;right:-10%;',
                        'bottom:12%;left:-12%;',
                        'top:42%;right:-16%;',
                        'bottom:5%;right:-10%;',
                    ];
                    $badges = $profile?->hero_badges ?? [
                        ['emoji' => '🔴', 'label' => 'Laravel'],
                        ['emoji' => '⚡', 'label' => 'Full Stack'],
                        ['emoji' => '🎨', 'label' => 'UI/UX'],
                    ];
                @endphp
                @foreach($badges as $idx => $badge)
                @php
                    $style = $badgeStyles[$idx] ?? 'top:5%;right:-10%;';
                @endphp
                <div class="avatar-badge" style="{{ $style }}">
                    {{ $badge['emoji'] ?? '🚀' }} {{ $badge['label'] ?? '' }}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="scroll-cue">
        <p style="font-size:0.7rem;color:var(--text-muted);font-family:'Inter',sans-serif;">Scroll</p>
        <div style="width:2px;height:2rem;background:linear-gradient(to bottom,var(--maroon),transparent);"></div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- ABOUT SECTION                                              --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="about-section section-py" id="about">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">About Me</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Get to Know Me</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">A passionate developer who loves turning ideas into reality through clean code and thoughtful design.</p>
        </div>
        <div class="about-grid">
            <div class="fade-in-up" data-delay="100">
                <div class="glass-card" style="padding:2rem;">
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.25rem;color:var(--text);margin-bottom:1rem;">Biografi</h3>
                    <p style="font-size:0.875rem;line-height:1.75;color:var(--text-muted);font-family:'Inter',sans-serif;margin-bottom:1.5rem;">{{ $profile?->bio ?? 'Informatics Engineering student with a deep passion for software engineering and web development.' }}</p>
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.25rem;color:var(--text);margin-bottom:1rem;">Career Objective</h3>
                    <p style="font-size:0.875rem;line-height:1.75;color:var(--text-muted);font-family:'Inter',sans-serif;">{{ $profile?->career_objective ?? 'To contribute to innovative software projects in a dynamic environment where I can leverage my full-stack skills, apply best engineering practices, and continue growing as a professional developer.' }}</p>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:1.5rem;">
                <div class="fade-in-up glass-card" data-delay="200" style="padding:1.5rem;">
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.125rem;color:var(--text);margin-bottom:1rem;">Personal Information</h3>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <div>
                            <p style="font-size:0.75rem;font-weight:600;color:var(--maroon);font-family:'Inter',sans-serif;margin-bottom:2px;">Full Name</p>
                            <p style="font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $profile?->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p style="font-size:0.75rem;font-weight:600;color:var(--maroon);font-family:'Inter',sans-serif;margin-bottom:2px;">Email</p>
                            <p style="font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $profile?->email ?? '-' }}</p>
                        </div>
                        <div>
                            <p style="font-size:0.75rem;font-weight:600;color:var(--maroon);font-family:'Inter',sans-serif;margin-bottom:2px;">Tagline</p>
                            <p style="font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $profile?->tagline ?? '-' }}</p>
                        </div>
                        <div>
                            <p style="font-size:0.75rem;font-weight:600;color:var(--maroon);font-family:'Inter',sans-serif;margin-bottom:2px;">University</p>
                             <p style="font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $profile?->university ?? env('PORTFOLIO_CAMPUS', 'Universitas Esa Unggul') }}</p>
                        </div>
                    </div>
                </div>
                <div class="fade-in-up glass-card" data-delay="300" style="padding:1.5rem;">
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.125rem;color:var(--text);margin-bottom:1rem;">Tech Stack</h3>
                    <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                        @if($skills && count($skills) > 0)
                            @foreach($skills as $skill)
                                <span class="tag">{{ $skill->name }}</span>
                            @endforeach
                        @else
                            @foreach(['Laravel', 'Filament', 'Livewire', 'Docker', 'MariaDB', 'Tailwind CSS'] as $skill)
                                <span class="tag">{{ $skill }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- SKILLS SECTION                                             --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="skills-section section-py" id="skills">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Skills</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Technical Expertise</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">A broad skillset spanning backend, frontend, databases, and dev tools — built through real projects and continuous learning.</p>
        </div>

        @php
            $categorizedSkills = $skills->groupBy('category');
        @endphp
        @if($categorizedSkills && count($categorizedSkills) > 0)
            {{-- Tab buttons --}}
            <div class="fade-in-up" data-delay="100" style="display:flex;flex-wrap:wrap;justify-content:center;gap:0.5rem;margin-bottom:2.5rem;" id="skill-tabs">
                @foreach($categorizedSkills as $categoryName => $catSkills)
                @php $loopIndex = $loop->index; @endphp
                <button class="tab-btn {{ $loopIndex === 0 ? 'active' : '' }}" data-category="{{ $loopIndex }}" onclick="switchSkillTab({{ $loopIndex }}, this)">
                    {{ $categoryName }}
                </button>
                @endforeach
            </div>

            {{-- Skill panels --}}
            @foreach($categorizedSkills as $categoryName => $catSkills)
            @php $loopIndex = $loop->index; @endphp
            <div class="skills-grid skill-panel fade-in-up" id="skill-panel-{{ $loopIndex }}" data-delay="{{ 100 + $loopIndex * 50 }}" style="{{ $loopIndex !== 0 ? 'display:none;' : '' }}">
                @foreach($catSkills as $skill)
                <div class="glass-card" style="padding:1.25rem;cursor:default;transition:transform .2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
                        <span style="font-size:1.5rem;">{{ $skill->icon ?? '⚙️' }}</span>
                        <div style="flex:1;">
                            <div style="display:flex;justify-content:space-between;align-items:center;">
                                <p style="font-weight:600;font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $skill->name }}</p>
                                <span style="font-size:0.75rem;font-weight:700;color:var(--maroon);font-family:monospace;">{{ $skill->level ?? 80 }}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" data-level="{{ $skill->level ?? 80 }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            {{-- Fallback: simple skills list --}}
            <div class="fade-in-up" data-delay="100" style="display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;">
                @foreach(['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Docker'] as $skill)
                <div class="glass-card" style="padding:1.25rem 1.75rem;cursor:default;">
                    <p style="font-weight:600;font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;">{{ $skill }}</p>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- PORTFOLIO SECTION                                          --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="portfolio-section section-py" id="portfolio">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Portfolio</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Featured Projects</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">A selection of projects I've built — from management systems to automation bots and e-commerce platforms.</p>
        </div>

        <div class="projects-grid">
            @forelse($projects as $i => $project)
            <div class="fade-in-up" data-delay="{{ 100 + $i * 80 }}">
                <a href="{{ route('projects.detail', $project->slug) }}" class="glass-card" style="display:flex;flex-direction:column;overflow:hidden;text-decoration:none;height:100%;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:relative;height:11rem;overflow:hidden;background:var(--bg-muted);">
                        @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform .5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        @else
                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--maroon-pale);">
                                @if($project->slug === 'ebikes-2026') 🚲 @else 🚀 @endif
                            </div>
                        @endif
                        <div style="position:absolute;inset:0;background:linear-gradient(to bottom,transparent 30%,rgba(255,255,255,0.95));"></div>
                        @if($project->is_final_project)
                        <span style="position:absolute;top:10px;left:10px;padding:3px 8px;border-radius:4px;font-size:0.7rem;font-weight:700;background:var(--grad-main);color:#fff;font-family:'Inter',sans-serif;">Featured</span>
                        @endif
                    </div>
                    <div style="padding:1.25rem;display:flex;flex-direction:column;flex:1;">
                        <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1rem;color:var(--text);margin-bottom:0.5rem;">{{ $project->title }}</h3>
                        <p style="font-size:0.8rem;line-height:1.6;color:var(--text-muted);font-family:'Inter',sans-serif;flex:1;margin-bottom:1rem;">{{ Str::limit($project->short_description, 100) }}</p>
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:9999px;font-family:'Inter',sans-serif;
                                {{ $project->status === 'completed' ? 'background:rgba(22,163,74,0.08);color:#16A34A;border:1px solid rgba(22,163,74,0.2);' :
                                   ($project->status === 'on_progress' ? 'background:rgba(37,99,235,0.08);color:#2563EB;border:1px solid rgba(37,99,235,0.2);' : 'background:rgba(217,119,6,0.08);color:#D97706;border:1px solid rgba(217,119,6,0.2);') }}">
                                {{ str_replace('_', ' ', $project->status) }}
                            </span>
                            <span style="font-size:0.75rem;color:var(--maroon);font-weight:600;font-family:'Inter',sans-serif;">Detail →</span>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:3rem;color:var(--text-muted);font-family:'Inter',sans-serif;">Belum ada project. Tambahkan via admin panel.</div>
            @endforelse
        </div>

        <div class="fade-in-up" style="text-align:center;margin-top:2.5rem;">
            <a href="{{ route('projects') }}"
               style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.75rem 2rem;border-radius:0.75rem;border:1.5px solid var(--maroon-border-strong);color:var(--maroon);font-family:'Inter',sans-serif;font-size:0.875rem;font-weight:600;text-decoration:none;transition:all .2s;"
               onmouseover="this.style.background='var(--maroon-pale)'" onmouseout="this.style.background='transparent'">
                Lihat Semua Projects <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- STATS STRIP                                                --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="stats-section">
    <div class="stats-dot-bg"></div>
    <div class="stats-grid">
        <div class="fade-in-up" data-delay="0" style="transition:transform .3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <p style="font-family:'Poppins',sans-serif;font-size:2.5rem;font-weight:900;color:#fff;">{{ $skills ? count($skills) : 0 }}+</p>
            <p style="color:rgba(255,255,255,0.7);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;font-family:'Inter',sans-serif;margin-top:4px;">Tech Skills</p>
        </div>
        <div class="fade-in-up" data-delay="80" style="transition:transform .3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <p style="font-family:'Poppins',sans-serif;font-size:2.5rem;font-weight:900;color:#fff;">{{ \App\Models\Project::count() }}</p>
            <p style="color:rgba(255,255,255,0.7);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;font-family:'Inter',sans-serif;margin-top:4px;">Total Projects</p>
        </div>
        <div class="fade-in-up" data-delay="160" style="transition:transform .3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <p style="font-family:'Poppins',sans-serif;font-size:2.5rem;font-weight:900;color:#fff;">{{ \App\Models\Project::where('status','completed')->count() }}</p>
            <p style="color:rgba(255,255,255,0.7);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;font-family:'Inter',sans-serif;margin-top:4px;">Completed</p>
        </div>
        <div class="fade-in-up" data-delay="240" style="transition:transform .3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <p style="font-family:'Poppins',sans-serif;font-size:2.5rem;font-weight:900;color:#fff;">{{ $certificates ? count($certificates) : 0 }}+</p>
            <p style="color:rgba(255,255,255,0.7);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;font-family:'Inter',sans-serif;margin-top:4px;">Certificates</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- EXPERIENCE SECTION                                         --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($experiences && count($experiences) > 0)
<section class="exp-section section-py" id="experience">
    <div class="max-container-sm">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Experience</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Work Experience</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">My professional journey in web development, design, and academic projects.</p>
        </div>
        <div style="position:relative;">
            <div class="timeline-line"></div>
            @foreach($experiences as $i => $exp)
            <div class="exp-item fade-in-up" data-delay="{{ 80 + $i * 100 }}">
                <div class="exp-dot" style="background:{{ $exp->color ?? '#800020' }};color:white;">
                    <i data-lucide="briefcase" style="width:16px;height:16px;color:white;"></i>
                </div>
                <div class="glass-card" style="flex:1;padding:1.5rem;transition:transform .2s;" onmouseover="this.style.transform='scale(1.01)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:0.75rem;margin-bottom:0.75rem;">
                        <div>
                            <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1rem;color:var(--text);">{{ $exp->role }}</h3>
                            <p style="font-size:0.875rem;color:var(--maroon);font-family:'Inter',sans-serif;">{{ $exp->company }}</p>
                        </div>
                        <div style="text-align:right;">
                            <span class="tag" style="margin-bottom:4px;display:block;">{{ $exp->type }}</span>
                            <p style="font-size:0.7rem;color:var(--text-faint);font-family:'Inter',sans-serif;">{{ $exp->period }}</p>
                        </div>
                    </div>
                    <p style="font-size:0.8rem;line-height:1.75;color:var(--text-muted);font-family:'Inter',sans-serif;margin-bottom:1rem;">{{ $exp->description }}</p>
                    @if(!empty($exp->skills))
                    <div style="display:flex;flex-wrap:wrap;gap:0.375rem;">
                        @foreach((array)$exp->skills as $s)
                        <span style="font-size:0.7rem;padding:3px 8px;border-radius:4px;background:var(--bg-muted);color:var(--text-muted);border:1px solid var(--maroon-border);font-family:'Inter',sans-serif;">{{ $s }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- CERTIFICATES SECTION                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($certificates && count($certificates) > 0)
<section class="certs-section section-py" id="certificates">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Certificates</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Certifications</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">Professional certifications and courses that have shaped my technical knowledge.</p>
        </div>
        <div class="certs-grid">
            @foreach($certificates as $i => $cert)
            <div class="fade-in-up glass-card" data-delay="{{ 80 * $i }}" style="overflow:hidden;transition:transform .3s;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:relative;height:9rem;overflow:hidden;background:var(--bg-muted);">
                    @if(!empty($cert->image))
                    <img src="{{ Str::startsWith($cert->image, ['http://', 'https://']) ? $cert->image : asset('storage/' . $cert->image) }}" alt="{{ $cert->name }}" style="width:100%;height:100%;object-fit:cover;opacity:.8;transition:transform .5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    @endif
                    <div style="position:absolute;inset:0;background:linear-gradient(135deg,{{ ($cert->color ?? '#800020') }}33,transparent);"></div>
                    <div style="position:absolute;top:10px;right:10px;">
                        <i data-lucide="award" style="width:20px;height:20px;color:{{ $cert->color ?? '#800020' }};"></i>
                    </div>
                </div>
                <div style="padding:1.25rem;">
                    <p style="font-size:0.7rem;font-weight:700;color:{{ $cert->color ?? '#800020' }};font-family:'Inter',sans-serif;margin-bottom:4px;">{{ $cert->issuer }} · {{ $cert->date }}</p>
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:0.875rem;color:var(--text);line-height:1.4;margin-bottom:1rem;">{{ $cert->name }}</h3>
                    <button style="width:100%;display:flex;align-items:center;justify-content:center;gap:8px;padding:8px;border-radius:8px;border:1px solid var(--maroon-border);color:var(--maroon);font-size:0.75rem;font-weight:600;background:transparent;cursor:pointer;font-family:'Inter',sans-serif;transition:opacity .2s;" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
                        <i data-lucide="eye" style="width:14px;height:14px;"></i> View Certificate
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- EDUCATION SECTION                                          --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($education && count($education) > 0)
<section class="edu-section section-py" id="education">
    <div class="max-container-sm">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Education</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Academic Journey</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">My educational path from elementary school to university.</p>
        </div>
        <div style="position:relative;">
            <div class="timeline-line"></div>
            @foreach($education as $i => $edu)
            <div class="fade-in-up" data-delay="{{ 80 * $i }}" style="position:relative;display:flex;gap:2rem;margin-bottom:2rem;padding-left:4rem;">
                <div style="position:absolute;left:0;top:4px;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.25rem;border:4px solid var(--bg);
                    {{ ($edu->current ?? false) ? 'background:var(--grad-main);box-shadow:var(--glow);' : 'background:var(--bg-muted);' }}">
                    {{ $edu->icon ?? '🎓' }}
                </div>
                <div class="glass-card {{ ($edu->current ?? false) ? 'ring' : '' }}" style="flex:1;padding:1.5rem;">
                    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:0.5rem;margin-bottom:0.5rem;">
                        <div>
                            <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1rem;color:var(--text);">{{ $edu->level }}</h3>
                            <p style="font-size:0.875rem;color:var(--maroon);font-family:'Inter',sans-serif;">{{ $edu->field }}</p>
                        </div>
                        <div style="text-align:right;">
                            @if($edu->current ?? false)
                            <span style="display:inline-block;padding:2px 10px;border-radius:9999px;font-size:0.7rem;font-weight:600;background:var(--maroon-pale);color:var(--maroon);border:1px solid var(--maroon-border-strong);font-family:'Inter',sans-serif;margin-bottom:4px;">● Current</span><br>
                            @endif
                            <p style="font-size:0.7rem;color:var(--text-faint);font-family:'Inter',sans-serif;">{{ $edu->period }}</p>
                        </div>
                    </div>
                    @if(!empty($edu->gpa))
                    <p style="font-size:0.75rem;color:var(--text-muted);font-family:'Inter',sans-serif;margin-top:0.5rem;">GPA: <span style="color:#16A34A;font-weight:600;">{{ $edu->gpa }}</span></p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- ACHIEVEMENTS SECTION                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($achievements && count($achievements) > 0)
<section class="ach-section section-py" id="achievements">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Achievements</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Awards & Recognition</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">Milestones that mark my growth as a student and developer.</p>
        </div>
        <div class="ach-grid">
            @foreach($achievements as $i => $ach)
            <div class="fade-in-up glass-card" data-delay="{{ 70 * $i }}" style="padding:1.5rem;transition:transform .3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <div style="display:flex;align-items:flex-start;gap:1rem;">
                    <div style="width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0;background:{{ ($ach->color ?? '#800020') }}12;border:1px solid {{ ($ach->color ?? '#800020') }}30;">
                        {{ $ach->icon ?? '🏆' }}
                    </div>
                    <div style="flex:1;min-width:0;">
                        <span style="font-size:0.7rem;font-weight:600;padding:2px 8px;border-radius:9999px;background:{{ ($ach->color ?? '#800020') }}12;color:{{ $ach->color ?? '#800020' }};font-family:'Inter',sans-serif;display:inline-block;margin-bottom:6px;">{{ $ach->category ?? '' }}</span>
                        <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:0.875rem;color:var(--text);line-height:1.4;margin-bottom:4px;">{{ $ach->title }}</h3>
                        <p style="font-size:0.75rem;color:var(--text-faint);font-family:'Inter',sans-serif;">{{ $ach->org }}</p>
                        <p style="font-size:0.75rem;font-weight:700;font-family:monospace;color:{{ $ach->color ?? '#800020' }};margin-top:4px;">{{ $ach->year }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- BLOG SECTION                                               --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($blogs && count($blogs) > 0)
<section class="blog-section section-py" id="blog">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Blog</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Latest Articles</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">Thoughts, tutorials, and insights from my journey in software engineering.</p>
        </div>
        <div class="blog-grid">
            @foreach($blogs as $i => $post)
            <div class="fade-in-up glass-card" data-delay="{{ 80 * $i }}" style="overflow:hidden;display:flex;flex-direction:column;height:100%;transition:transform .3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:relative;height:10rem;overflow:hidden;background:var(--bg-muted);">
                    @if(!empty($post->image))
                    <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:100%;height:100%;object-fit:cover;opacity:.9;transition:transform .5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    @endif
                    <div style="position:absolute;inset:0;background:linear-gradient(to bottom,transparent 40%,rgba(255,255,255,0.9));"></div>
                    <span style="position:absolute;top:10px;left:10px;padding:3px 8px;border-radius:4px;font-size:0.7rem;font-weight:600;color:#fff;background:{{ $post->color ?? '#800020' }};font-family:'Inter',sans-serif;">{{ $post->category }}</span>
                </div>
                <div style="padding:1.25rem;display:flex;flex-direction:column;flex:1;">
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;font-size:0.7rem;color:var(--text-faint);font-family:'Inter',sans-serif;">
                        <span style="display:flex;align-items:center;gap:4px;"><i data-lucide="calendar" style="width:12px;height:12px;"></i>{{ $post->date }}</span>
                        <span style="display:flex;align-items:center;gap:4px;"><i data-lucide="clock" style="width:12px;height:12px;"></i>{{ $post->read_time }}</span>
                    </div>
                    <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:0.875rem;color:var(--text);line-height:1.5;margin-bottom:0.75rem;flex:1;">{{ $post->title }}</h3>
                    <p style="font-size:0.75rem;line-height:1.6;color:var(--text-faint);font-family:'Inter',sans-serif;margin-bottom:1rem;">{{ Str::limit($post->excerpt, 100) }}</p>
                    <a href="#" style="display:flex;align-items:center;gap:6px;font-size:0.75rem;font-weight:600;color:var(--maroon);text-decoration:none;transition:gap .2s;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">
                        Read More <i data-lucide="chevron-right" style="width:14px;height:14px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- CONTACT SECTION                                            --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="contact-section section-py" id="contact">
    <div class="max-container">
        <div class="text-center fade-in-up" style="margin-bottom:4rem;">
            <span class="section-label">Contact</span>
            <h2 style="font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(1.75rem,4vw,3rem);color:var(--text);margin-bottom:1rem;">Get In Touch</h2>
            <p style="font-size:1rem;color:var(--text-muted);font-family:'Inter',sans-serif;max-width:36rem;margin:0 auto;">Have a project in mind or just want to say hello? I'd love to hear from you.</p>
        </div>
        <div class="contact-grid">
            {{-- Contact Info --}}
            <div style="display:flex;flex-direction:column;gap:1rem;">
                @php
                    $contactItems = array_filter([
                        $profile?->email ? ['icon' => 'mail', 'label' => 'Email', 'value' => $profile->email, 'href' => 'mailto:' . $profile->email] : null,
                        $profile?->github ? ['icon' => 'github', 'label' => 'GitHub', 'value' => $profile->github, 'href' => $profile->github] : null,
                        $profile?->linkedin ? ['icon' => 'linkedin', 'label' => 'LinkedIn', 'value' => $profile->linkedin, 'href' => $profile->linkedin] : null,
                        ['icon' => 'map-pin', 'label' => 'Location', 'value' => env('PORTFOLIO_LOCATION', 'Indonesia'), 'href' => '#'],
                    ]);
                @endphp
                @foreach($contactItems as $i => $contact)
                <div class="fade-in-up glass-card" data-delay="{{ 80 * $i }}" style="padding:1rem;transition:transform .2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    <a href="{{ $contact['href'] }}" target="{{ str_starts_with($contact['href'], 'http') ? '_blank' : '_self' }}" style="display:flex;align-items:center;gap:1rem;text-decoration:none;">
                        <div style="width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;background:var(--maroon-pale);border:1px solid var(--maroon-border);flex-shrink:0;">
                            <i data-lucide="{{ $contact['icon'] }}" style="width:16px;height:16px;color:var(--maroon);"></i>
                        </div>
                        <div>
                            <p style="font-size:0.7rem;font-weight:600;color:var(--text-muted);font-family:'Inter',sans-serif;margin-bottom:2px;">{{ $contact['label'] }}</p>
                            <p style="font-size:0.875rem;color:var(--text);font-family:'Inter',sans-serif;word-break:break-word;">{{ $contact['value'] }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            {{-- Contact Form --}}
            <div class="fade-in-up glass-card" data-delay="200" style="padding:2rem;">
                <h3 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:1.25rem;color:var(--text);margin-bottom:1.5rem;">Send a Message</h3>
                @if(session('success'))
                <div style="margin-bottom:1.25rem;padding:0.75rem 1rem;border-radius:0.75rem;font-size:0.875rem;font-weight:500;background:rgba(22,163,74,0.08);border:1px solid rgba(22,163,74,0.3);color:#16A34A;font-family:'Inter',sans-serif;">
                    ✓ {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('contact.send') }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                    @csrf
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <input name="name" type="text" placeholder="Your Name" required class="contact-input" value="{{ old('name') }}">
                        <input name="email" type="email" placeholder="Your Email" required class="contact-input" value="{{ old('email') }}">
                    </div>
                    <input name="subject" type="text" placeholder="Subject" class="contact-input" value="{{ old('subject') }}">
                    <textarea name="message" placeholder="Your Message" rows="5" required class="contact-input" style="resize:vertical;">{{ old('message') }}</textarea>
                    <button type="submit"
                        style="display:flex;align-items:center;justify-content:center;gap:0.5rem;padding:0.875rem 1.5rem;border-radius:0.75rem;background:var(--grad-main);color:#fff;font-family:'Inter',sans-serif;font-size:0.875rem;font-weight:600;border:none;cursor:pointer;box-shadow:var(--glow);transition:transform .2s;"
                        onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        <i data-lucide="send" style="width:16px;height:16px;"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Re-init Lucide after dynamic content
    document.addEventListener('DOMContentLoaded', function () {
        lucide.createIcons();
    });

    // Skill Tab Switcher
    function switchSkillTab(idx, btn) {
        // Hide all panels
        document.querySelectorAll('.skill-panel').forEach(p => p.style.display = 'none');
        // Deactivate all tabs
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        // Show selected
        const panel = document.getElementById('skill-panel-' + idx);
        if (panel) panel.style.display = 'grid';
        btn.classList.add('active');

        // Trigger skill bar animation for newly visible bars
        panel.querySelectorAll('.skill-bar-fill[data-level]').forEach(bar => {
            const level = bar.dataset.level;
            setTimeout(() => { bar.style.width = level + '%'; }, 100);
        });
    }

    // Hero subtitle rotator
    const subtitles = [
        '{{ $profile?->tagline ?? "Full Stack Web Developer" }}',
        'UI/UX Enthusiast',
        'Informatics Engineering Student',
    ];
    let subIdx = 0;
    const subEl = document.getElementById('hero-subtitle');
    if (subEl) {
        setInterval(() => {
            subIdx = (subIdx + 1) % subtitles.length;
            subEl.style.animation = 'none';
            subEl.offsetHeight; // reflow
            subEl.style.animation = '';
            subEl.textContent = subtitles[subIdx];
        }, 2800);
    }
</script>
@endsection