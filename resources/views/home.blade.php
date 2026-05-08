@extends('layouts.app')

@section('title', 'Angie ..... | OJT E-Portfolio')

@section('styles')
<style>
    /* ── Loading Screen ── */
    #splash-screen {
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: #050714;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: opacity 0.7s ease, visibility 0.7s ease;
    }
    #splash-screen.fade-out {
        opacity: 0;
        visibility: hidden;
    }
    .splash-logo {
        width: 88px;
        height: 88px;
        border-radius: 24px;
        background: linear-gradient(135deg, #6366f1, #06b6d4);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 28px;
        box-shadow: 0 0 60px rgba(99,102,241,0.45);
        animation: splash-pulse 1.8s ease-in-out infinite;
    }
    @keyframes splash-pulse {
        0%, 100% { box-shadow: 0 0 40px rgba(99,102,241,0.35); transform: scale(1); }
        50%       { box-shadow: 0 0 80px rgba(99,102,241,0.6);  transform: scale(1.04); }
    }
    .splash-name {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 2.25rem;
        background: linear-gradient(135deg, #fff 30%, #6366f1, #06b6d4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.02em;
        margin-bottom: 6px;
    }
    .splash-sub {
        color: #64748b;
        font-size: 0.8rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-weight: 500;
        margin-bottom: 48px;
    }
    .splash-bar-wrap {
        width: 220px;
        height: 3px;
        background: rgba(255,255,255,0.07);
        border-radius: 99px;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .splash-bar {
        height: 100%;
        width: 0%;
        border-radius: 99px;
        background: linear-gradient(90deg, #6366f1, #06b6d4);
        transition: width 0.08s linear;
    }
    .splash-percent {
        color: #475569;
        font-size: 0.7rem;
        letter-spacing: 0.05em;
        font-variant-numeric: tabular-nums;
    }
    /* Grid dots behind splash */
    .splash-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(99,102,241,0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,0.05) 1px, transparent 1px);
        background-size: 48px 48px;
        mask-image: radial-gradient(ellipse 70% 70% at 50% 50%, black 30%, transparent 100%);
        pointer-events: none;
    }

    .hero-section {
        min-height: calc(100vh - 64px);
        position: relative;
        overflow: hidden;
        background-image: url('{{ asset('public/images/omsc-hero.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(5, 7, 20, 0.78);
        z-index: 1;
    }

    /* Animated grid background */
    .hero-grid {
        position: absolute;
        inset: 0;
        z-index: 2;
        background-image:
            linear-gradient(rgba(99,102,241,0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,0.06) 1px, transparent 1px);
        background-size: 50px 50px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    }

    /* Floating orbs */
    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
        z-index: 2;
    }

    .orb-1 {
        width: 400px; height: 400px;
        background: rgba(99, 102, 241, 0.15);
        top: -100px; left: -100px;
        animation: orb-move-1 12s ease-in-out infinite alternate;
    }

    .orb-2 {
        width: 300px; height: 300px;
        background: rgba(6, 182, 212, 0.1);
        bottom: 0; right: -80px;
        animation: orb-move-2 10s ease-in-out infinite alternate;
    }

    .orb-3 {
        width: 200px; height: 200px;
        background: rgba(139, 92, 246, 0.12);
        top: 50%; left: 50%;
        animation: orb-move-3 15s ease-in-out infinite alternate;
    }

    @keyframes orb-move-1 {
        from { transform: translate(0, 0) scale(1); }
        to   { transform: translate(80px, 60px) scale(1.2); }
    }

    @keyframes orb-move-2 {
        from { transform: translate(0, 0) scale(1); }
        to   { transform: translate(-60px, -80px) scale(1.1); }
    }

    @keyframes orb-move-3 {
        from { transform: translate(-50%, -50%) scale(1); }
        to   { transform: translate(-40%, -60%) scale(1.3); }
    }

    /* Typewriter cursor */
    .cursor {
        display: inline-block;
        width: 3px;
        height: 1em;
        background: #6366f1;
        margin-left: 4px;
        vertical-align: middle;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50%       { opacity: 0; }
    }

    /* Avatar ring */
    .avatar-ring {
        background: linear-gradient(135deg, #6366f1, #06b6d4, #6366f1);
        background-size: 200% 200%;
        animation: gradient-shift 4s ease infinite;
        padding: 3px;
        border-radius: 50%;
    }

    /* Stat card hover */
    .stat-card {
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        border-color: rgba(99, 102, 241, 0.4) !important;
        box-shadow: 0 8px 30px rgba(99, 102, 241, 0.15);
    }

    /* Tech badge */
    .tech-badge {
        transition: all 0.2s ease;
    }
    .tech-badge:hover {
        background: rgba(99, 102, 241, 0.2);
        border-color: rgba(99, 102, 241, 0.5);
        transform: translateY(-1px);
    }

    /* Scroll indicator */
    .scroll-indicator {
        animation: bounce 2s infinite;
    }
    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40%, 43% { transform: translateX(-50%) translateY(-12px); }
        70% { transform: translateX(-50%) translateY(-6px); }
    }
</style>
@endsection

@section('content')

{{-- ===== SPLASH / LOADING SCREEN ===== --}}
<div id="splash-screen" aria-hidden="true">
    <div class="splash-grid"></div>
    <div class="relative z-10 flex flex-col items-center">
        <div class="splash-logo">
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle"
                      font-family="Poppins, sans-serif" font-weight="800" font-size="22"
                      fill="white">AN</text>
            </svg>
        </div>
        <p class="splash-name">Angie</p>
        <p class="splash-sub">OJT E-Portfolio</p>
        <div class="splash-bar-wrap">
            <div class="splash-bar" id="splash-bar"></div>
        </div>
        <p class="splash-percent" id="splash-percent">0%</p>
    </div>
</div>

{{-- ===== HERO SECTION ===== --}}
<section class="hero-section flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="hero-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="relative z-10 max-w-6xl mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-20">

            {{-- Left: Text Content --}}
            <div data-aos="fade-right" data-aos-delay="100">

                {{-- Status badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card border border-brand-500/30 text-sm text-brand-400 font-medium mb-6">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Currently on OJT Training
                </div>

                {{-- Name --}}
                <h1 class="font-poppins font-bold text-4xl sm:text-5xl lg:text-6xl text-white leading-tight mb-4">
                    Hi, I'm <br>
                    <span class="gradient-text">Test</span><br>
                    <span class="text-slate-200">Test</span>
                </h1>

                {{-- Typewriter role --}}
                <div class="flex items-center gap-2 text-lg sm:text-xl text-slate-400 font-medium mb-6 h-8">
                    <i class="fa-solid fa-terminal text-brand-400 text-sm"></i>
                    <span id="typewriter"></span>
                    <span class="cursor"></span>
                </div>

                {{-- Description --}}
                <p class="text-slate-400 text-base leading-relaxed mb-8 max-w-lg">
                    A passionate <span class="text-brand-400 font-medium">BSIT student</span> from Occidental Mindoro State College
                    currently undergoing On-the-Job Training. Building modern web applications and turning ideas into real-world solutions.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 mb-10">
                  <!--   <a href="{{ route('projects') }}"
                       class="flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow">
                        <i class="fa-solid fa-diagram-project text-xs"></i>
                        View Projects
                    </a> -->
                    <a href="{{ route('about') }}"
                       class="flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white glass-card border border-white/10 hover:border-brand-500/50 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-user text-xs text-brand-400"></i>
                        About Me
                    </a>
                    <a href="#"
                       class="flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-slate-300 glass-card border border-white/10 hover:border-accent-500/50 hover:text-accent-400 transition-all">
                        <i class="fa-solid fa-file-arrow-down text-xs"></i>
                        Resume
                    </a>
                </div>

                {{-- Tech Stack Badges --}}
                <div>
                    <p class="text-xs text-slate-500 uppercase tracking-wider mb-3 font-medium"></p>
                    <div class="flex flex-wrap gap-2">
                        @php
                            
                        @endphp
                       
                    </div>
                </div>
            </div>

            {{-- Right: Avatar + Floating Cards --}}
            <div class="flex justify-center items-center relative" data-aos="fade-left" data-aos-delay="200">
                <div class="relative">

                    {{-- Avatar --}}
                    <div class="avatar-ring w-64 h-64 sm:w-72 sm:h-72 mx-auto animate-float">
                        <div class="w-full h-full rounded-full bg-navy-800 overflow-hidden flex items-center justify-center">
                            {{-- Replace src with actual photo --}}
                            <img src="https://ui-avatars.com/api/?name=David+Russel+Prado&size=300&background=4f46e5&color=ffffff&font-size=0.35&bold=true"
                                 alt="David Russel Prado"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Floating stat: Days OJT --}}
                    <div class="absolute -left-6 top-8 glass-card border border-brand-500/30 rounded-2xl p-3 shadow-xl animate-float" style="animation-delay: 0.5s;">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-brand-600/20 flex items-center justify-center">
                                <i class="fa-solid fa-clock text-brand-400 text-xs"></i>
                            </div>
                            <div>
                                <p class="font-poppins font-bold text-white text-lg leading-none">486</p>
                                <p class="text-xs text-slate-400">OJT Hours</p>
                            </div>
                        </div>
                    </div>

                    {{-- Floating stat: Projects --}}
                    <div class="absolute -right-6 top-16 glass-card border border-accent-500/30 rounded-2xl p-3 shadow-xl animate-float" style="animation-delay: 1s;">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-accent-500/20 flex items-center justify-center">
                                <i class="fa-solid fa-code text-accent-400 text-xs"></i>
                            </div>
                            <div>
                                <p class="font-poppins font-bold text-white text-lg leading-none">12+</p>
                                <p class="text-xs text-slate-400">Projects</p>
                            </div>
                        </div>
                    </div>

                    {{-- Floating stat: Skills --}}
                    <div class="absolute -left-4 bottom-8 glass-card border border-purple-500/30 rounded-2xl p-3 shadow-xl animate-float" style="animation-delay: 1.5s;">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center">
                                <i class="fa-solid fa-star text-purple-400 text-xs"></i>
                            </div>
                            <div>
                                <p class="font-poppins font-bold text-white text-lg leading-none">15+</p>
                                <p class="text-xs text-slate-400">Skills</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <a href="#stats" class="scroll-indicator absolute bottom-8 left-1/2 flex flex-col items-center gap-1 text-slate-500 hover:text-brand-400 transition-colors">
        <span class="text-xs">Scroll</span>
        <i class="fa-solid fa-chevron-down text-xs"></i>
    </a>
</section>

{{-- ===== STATS SECTION ===== --}}
<section id="stats" class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $stats = [
                    ['value' => '486',  'label' => 'OJT Hours Rendered',   'icon' => 'fa-clock',           'color' => 'from-brand-600 to-brand-500'],
                    ['value' => '12+',  'label' => 'Projects Completed',    'icon' => 'fa-diagram-project', 'color' => 'from-cyan-600 to-cyan-500'],
                    ['value' => '15+',  'label' => 'Skills Acquired',       'icon' => 'fa-code',            'color' => 'from-purple-600 to-purple-500'],
                    ['value' => '3',    'label' => 'Months of Training',    'icon' => 'fa-calendar-days',   'color' => 'from-emerald-600 to-emerald-500'],
                ];
            @endphp
            @foreach($stats as $i => $stat)
                <div class="stat-card glass-card border border-white/10 rounded-2xl p-6 text-center"
                     data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $stat['color'] }} flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fa-solid {{ $stat['icon'] }} text-white text-lg"></i>
                    </div>
                    <p class="font-poppins font-bold text-3xl text-white mb-1 counter" data-target="{{ (int)$stat['value'] }}">
                        0
                    </p>
                    <p class="text-slate-400 text-xs leading-tight">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== QUICK NAVIGATION ===== --}}
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <p class="text-brand-400 text-sm font-semibold uppercase tracking-widest mb-2">Explore</p>
            <h2 class="font-poppins font-bold text-3xl sm:text-4xl text-white">My Portfolio</h2>
            <p class="text-slate-400 mt-3 max-w-md mx-auto">Navigate through my journey, skills, and the work I've done during my OJT.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @php
                $cards = [
                    [
                        'route'   => 'about',
                        'title'   => 'About Me',
                        'desc'    => 'Learn about my background, education, and personal journey as an IT student.',
                        'icon'    => 'fa-user-circle',
                        'gradient'=> 'from-brand-600 to-brand-500',
                        'border'  => 'hover:border-brand-500/50',
                        'delay'   => 0,
                    ],
                    [
                        'route'   => 'ojt',
                        'title'   => 'OJT Experience',
                        'desc'    => 'Details about my on-the-job training — company, duration, role, and learnings.',
                        'icon'    => 'fa-briefcase',
                        'gradient'=> 'from-cyan-600 to-cyan-500',
                        'border'  => 'hover:border-cyan-500/50',
                        'delay'   => 100,
                    ],
                   /*  [
                        'route'   => 'skills',
                        'title'   => 'Skills',
                        'desc'    => 'Technical and soft skills developed through academics and hands-on training.',
                        'icon'    => 'fa-code',
                        'gradient'=> 'from-purple-600 to-purple-500',
                        'border'  => 'hover:border-purple-500/50',
                        'delay'   => 200,
                    ], */
                    /* [
                        'route'   => 'projects',
                        'title'   => 'Projects',
                        'desc'    => 'A showcase of web applications and systems I built during my training.',
                        'icon'    => 'fa-diagram-project',
                        'gradient'=> 'from-orange-600 to-orange-500',
                        'border'  => 'hover:border-orange-500/50',
                        'delay'   => 0,
                    ],
                    [
                        'route'   => 'gallery',
                        'title'   => 'Gallery',
                        'desc'    => 'Photos and memories from my OJT experience at the workplace.',
                        'icon'    => 'fa-images',
                        'gradient'=> 'from-pink-600 to-pink-500',
                        'border'  => 'hover:border-pink-500/50',
                        'delay'   => 100,
                    ], */
                    [
                        'route'   => 'contact',
                        'title'   => 'Contact',
                        'desc'    => 'Get in touch with me for collaborations, opportunities, or just to say hello.',
                        'icon'    => 'fa-envelope',
                        'gradient'=> 'from-emerald-600 to-emerald-500',
                        'border'  => 'hover:border-emerald-500/50',
                        'delay'   => 200,
                    ],
                ];
            @endphp

            @foreach($cards as $card)
                <a href="{{ route($card['route']) }}"
                   class="group glass-card border border-white/10 {{ $card['border'] }} rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-black/30 block"
                   data-aos="fade-up" data-aos-delay="{{ $card['delay'] }}">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $card['gradient'] }} flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fa-solid {{ $card['icon'] }} text-white text-lg"></i>
                    </div>
                    <h3 class="font-poppins font-semibold text-lg text-white mb-2 group-hover:text-brand-400 transition-colors">
                        {{ $card['title'] }}
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                    <div class="flex items-center gap-1 mt-4 text-xs text-brand-400 font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                        Explore <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== LATEST HIGHLIGHT ===== --}}
<!-- <section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="glass-card border border-brand-500/20 rounded-3xl p-8 sm:p-12 relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/10 text-brand-400 border border-brand-500/20 mb-4">
                        <i class="fa-solid fa-star text-xs"></i> Featured
                    </span>
                    <h2 class="font-poppins font-bold text-2xl sm:text-3xl text-white mb-4">
                        Currently Building Real-World Web Solutions
                    </h2>
                    <p class="text-slate-400 leading-relaxed mb-6">
                        During my OJT, I've been working on full-stack web applications using <span class="text-brand-400">Laravel</span>,
                        <span class="text-cyan-400">MySQL</span>, and modern frontend technologies. Each project has taught me
                        invaluable lessons about professional software development.
                    </p>
                    <a href="{{ route('projects') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow">
                        <i class="fa-solid fa-eye text-xs"></i>
                        See All Projects
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    @php
                        $highlights = [
                            ['label' => 'Backend', 'value' => 'Laravel & PHP', 'icon' => 'fab fa-laravel', 'color' => 'text-red-400'],
                            ['label' => 'Frontend', 'value' => 'Tailwind CSS', 'icon' => 'fa-solid fa-palette', 'color' => 'text-cyan-400'],
                            ['label' => 'Database', 'value' => 'MySQL', 'icon' => 'fa-solid fa-database', 'color' => 'text-yellow-400'],
                            ['label' => 'Version Control', 'value' => 'Git & GitHub', 'icon' => 'fab fa-git-alt', 'color' => 'text-orange-400'],
                        ];
                    @endphp
                    @foreach($highlights as $h)
                        <div class="glass-card border border-white/10 rounded-xl p-4">
                            <i class="{{ $h['icon'] }} {{ $h['color'] }} text-xl mb-2 block"></i>
                            <p class="text-xs text-slate-500 mb-0.5">{{ $h['label'] }}</p>
                            <p class="text-sm font-semibold text-white">{{ $h['value'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> -->

@endsection

@section('scripts')
<script>
    // Typewriter effect
    const roles = [
        'Web Developer',
        'Laravel Developer',
        'OJT Student @ OMSC',
        'BSIT Student',
        'Problem Solver',
    ];
    let roleIndex = 0, charIndex = 0, isDeleting = false;
    const typeEl = document.getElementById('typewriter');

    function typewriter() {
        const current = roles[roleIndex];
        if (isDeleting) {
            typeEl.textContent = current.substring(0, charIndex--);
        } else {
            typeEl.textContent = current.substring(0, charIndex++);
        }

        let delay = isDeleting ? 60 : 100;

        if (!isDeleting && charIndex === current.length + 1) {
            delay = 2000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            roleIndex = (roleIndex + 1) % roles.length;
            delay = 400;
        }

        setTimeout(typewriter, delay);
    }
    typewriter();

    // Counter animation
    const counters = document.querySelectorAll('.counter');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                const suffix = entry.target.closest('[data-aos]')
                    ? (entry.target.closest('.stat-card')?.querySelector('.text-slate-400')?.textContent.includes('Projects') ? '+' :
                       entry.target.closest('.stat-card')?.querySelector('.text-slate-400')?.textContent.includes('Skills') ? '+' : '')
                    : '';
                let current = 0;
                const increment = Math.ceil(target / 60);
                const timer = setInterval(() => {
                    current = Math.min(current + increment, target);
                    entry.target.textContent = current + (current === target ? (target >= 12 ? '+' : '') : '');
                    if (current >= target) {
                        clearInterval(timer);
                        entry.target.textContent = target + (target === 486 || target === 3 ? '' : '+');
                    }
                }, 25);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));

    // ── Splash Screen ──────────────────────────────────────────────────────
    (function () {
        const splash   = document.getElementById('splash-screen');
        const bar      = document.getElementById('splash-bar');
        const pct      = document.getElementById('splash-percent');
        const KEY      = 'ojt_splash_shown';

        if (!splash) return;

        // Only show once per browser session
        if (sessionStorage.getItem(KEY)) {
            splash.style.display = 'none';
            return;
        }

        // Prevent body scroll while splash is up
        document.body.style.overflow = 'hidden';

        const DURATION = 2400; // ms total before fade-out
        const start    = performance.now();

        function tick(now) {
            const elapsed  = Math.min(now - start, DURATION);
            const progress = Math.round((elapsed / DURATION) * 100);
            bar.style.width   = progress + '%';
            pct.textContent   = progress + '%';

            if (elapsed < DURATION) {
                requestAnimationFrame(tick);
            } else {
                // Small pause at 100%, then fade out
                setTimeout(() => {
                    splash.classList.add('fade-out');
                    document.body.style.overflow = '';
                    sessionStorage.setItem(KEY, '1');
                }, 200);
            }
        }

        requestAnimationFrame(tick);
    })();
</script>
@endsection
