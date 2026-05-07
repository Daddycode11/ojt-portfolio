<!DOCTYPE html>
<html lang="en" x-data="{ mobileOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Angie - OJT E-Portfolio | OMSC | Web Developer">
    <title>@yield('title', 'Angie | OJT Portfolio')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Tailwind CSS --}}
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
                        navy: {
                            950: '#020617',
                            900: '#0a0f1e',
                            800: '#0d1526',
                            700: '#111d35',
                        },
                        brand: {
                            50:  '#eef2ff',
                            100: '#e0e7ff',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        },
                        accent: {
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-down': 'slideDown 0.3s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            'from': { boxShadow: '0 0 20px #6366f1' },
                            'to':   { boxShadow: '0 0 40px #6366f1, 0 0 80px #6366f155' },
                        },
                        slideDown: {
                            'from': { opacity: '0', transform: 'translateY(-10px)' },
                            'to':   { opacity: '1', transform: 'translateY(0)' },
                        },
                    }
                }
            }
        }
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- AOS Animate On Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0f1e;
            color: #e2e8f0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0a0f1e; }
        ::-webkit-scrollbar-thumb { background: #4f46e5; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #6366f1; }

        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Glassmorphism card */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Glow button */
        .btn-glow {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.7);
            transform: translateY(-2px);
        }

        /* Active nav link */
        .nav-active {
            color: #6366f1 !important;
            font-weight: 600;
        }
        .nav-active::after {
            content: '';
            display: block;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            border-radius: 1px;
            margin-top: 2px;
        }

        /* Mesh gradient background */
        .mesh-bg {
            background:
                radial-gradient(at 20% 20%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 10%, rgba(6, 182, 212, 0.1) 0px, transparent 50%),
                radial-gradient(at 50% 80%, rgba(99, 102, 241, 0.08) 0px, transparent 50%),
                #0a0f1e;
        }

        @keyframes gradient-shift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animated-gradient {
            background: linear-gradient(-45deg, #6366f1, #4f46e5, #06b6d4, #0891b2);
            background-size: 400% 400%;
            animation: gradient-shift 8s ease infinite;
        }
    </style>

    @yield('styles')
</head>
<body class="mesh-bg min-h-screen">

    {{-- ===== NAVBAR ===== --}}
    @php
        $navLinks = [
            ['route' => 'about',    'label' => 'About',    'icon' => 'fa-user'],
            ['route' => 'ojt',      'label' => 'OJT',      'icon' => 'fa-briefcase'],
        /*     ['route' => 'skills',   'label' => 'Skills',   'icon' => 'fa-code'], */
            /* ['route' => 'projects', 'label' => 'Projects', 'icon' => 'fa-diagram-project'], */
            /* ['route' => 'gallery',  'label' => 'Gallery',  'icon' => 'fa-images'], */
            ['route' => 'contact',  'label' => 'Contact',  'icon' => 'fa-envelope'],
        ];
        // Dropdown 1 — "Home" (front-matter pages)
        $homeDropdown = [
            ['route' => 'chapter.acknowledgement', 'label' => 'Acknowledgement',       'icon' => 'fa-hands-praying'],
            ['route' => 'chapter.toc',             'label' => 'Table of Contents',     'icon' => 'fa-list-ul'],
            ['route' => 'chapter.prayer',          'label' => 'Student Trainee Prayer','icon' => 'fa-church'],
            ['route' => 'chapter.philosophy',      'label' => 'Personal Philosophy',   'icon' => 'fa-lightbulb'],
            ['route' => 'chapter.career',          'label' => 'Career Plan',           'icon' => 'fa-road'],
        ];
        // Dropdown 2 — "Chapters" (Chapter I–IV)
        $chapterLinks = [
            ['route' => 'chapter.one',   'label' => 'Chapter I',   'icon' => 'fa-i'],
            ['route' => 'chapter.two',   'label' => 'Chapter II',  'icon' => 'fa-ii'],
            ['route' => 'chapter.three', 'label' => 'Chapter III', 'icon' => 'fa-iii'],
            ['route' => 'chapter.four',  'label' => 'Chapter IV',  'icon' => 'fa-iv'],
        ];
        $appendices = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R'];
    @endphp

    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10"
         x-data="{ scrolled: false }"
         x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
         :class="scrolled ? 'shadow-lg shadow-black/30' : ''">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 group flex-shrink-0">
                    <div class="w-9 h-9 rounded-lg animated-gradient flex items-center justify-center text-white font-bold text-sm shadow-lg group-hover:scale-110 transition-transform">
                        AN
                    </div>
                    <span class="font-poppins font-semibold text-white text-sm hidden sm:block">
                        <span class="gradient-text">Angie</span>
                    </span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden lg:flex items-center gap-0.5">

                    {{-- Home link --}}
                   <!--  <a href="{{ route('home') }}"
                       class="px-2.5 py-2 text-xs font-medium text-slate-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200 flex items-center gap-1.5
                              {{ request()->routeIs('home') ? 'nav-active text-brand-400' : '' }}">
                        <i class="fa-solid fa-house text-xs opacity-70"></i>
                        Home
                    </a>
 -->
                    {{-- HOME dropdown (front-matter pages) --}}
                    <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                        <button @click="open = !open"
                                @mouseenter="open = true"
                                class="px-2.5 py-2 text-xs font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5
                                       {{ request()->routeIs('chapter.acknowledgement','chapter.toc','chapter.prayer','chapter.philosophy','chapter.career') ? 'text-brand-400 font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            <i class="fa-solid fa-file-lines text-xs opacity-70"></i>
                            Home
                            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180 text-brand-400' : ''"></i>
                        </button>
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                             class="absolute top-full left-0 mt-1 w-60 rounded-2xl glass-card border border-white/10 shadow-2xl shadow-black/40 overflow-hidden z-50"
                             style="display:none;">
                            <div class="py-1.5">
                                <div class="px-3 py-1.5">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-widest">Front Matter</span>
                                </div>
                                @foreach($homeDropdown as $item)
                                    <a href="{{ route($item['route']) }}"
                                       @click="open = false"
                                       class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-300 hover:text-white hover:bg-brand-500/10 transition-all group
                                              {{ request()->routeIs($item['route']) ? 'text-brand-400 bg-brand-500/10' : '' }}">
                                        <span class="w-7 h-7 rounded-lg bg-brand-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-brand-500/20 transition-colors">
                                            <i class="fa-solid {{ $item['icon'] }} text-brand-400 text-xs"></i>
                                        </span>
                                        {{ $item['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Regular links --}}
                    @foreach($navLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="px-2.5 py-2 text-xs font-medium text-slate-300 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200 flex items-center gap-1.5
                                  {{ request()->routeIs($link['route']) ? 'nav-active text-brand-400' : '' }}">
                            <i class="fa-solid {{ $link['icon'] }} text-xs opacity-70"></i>
                            {{ $link['label'] }}
                        </a>
                    @endforeach

                    {{-- CHAPTERS Dropdown (I–IV) --}}
                    <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                        <button @click="open = !open"
                                @mouseenter="open = true"
                                class="px-2.5 py-2 text-xs font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5
                                       {{ request()->routeIs('chapter.one','chapter.two','chapter.three','chapter.four') ? 'text-purple-400 font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            <i class="fa-solid fa-book-open text-xs opacity-70"></i>
                            Chapters
                            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180 text-purple-400' : ''"></i>
                        </button>
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                             class="absolute top-full left-0 mt-1 w-48 rounded-2xl glass-card border border-white/10 shadow-2xl shadow-black/40 overflow-hidden z-50"
                             style="display:none;">
                            <div class="py-1.5">
                                <div class="px-3 py-1.5">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-widest">Chapters</span>
                                </div>
                                @foreach($chapterLinks as $ch)
                                    <a href="{{ route($ch['route']) }}"
                                       @click="open = false"
                                       class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-300 hover:text-white hover:bg-purple-500/10 transition-all group
                                              {{ request()->routeIs($ch['route']) ? 'text-purple-400 bg-purple-500/10' : '' }}">
                                        <span class="w-7 h-7 rounded-lg bg-purple-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-purple-500/20 transition-colors font-bold text-purple-400 text-xs">
                                            {{ ['I','II','III','IV'][array_search($ch, $chapterLinks)] }}
                                        </span>
                                        {{ $ch['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- APPENDICES Dropdown --}}
                    <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                        <button @click="open = !open"
                                @mouseenter="open = true"
                                class="px-2.5 py-2 text-xs font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5
                                       {{ request()->routeIs('appendix') ? 'text-cyan-400 font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            <i class="fa-solid fa-folder-open text-xs opacity-70"></i>
                            Appendices
                            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'rotate-180 text-cyan-400' : ''"></i>
                        </button>
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                             class="absolute top-full right-0 mt-1 w-52 rounded-2xl glass-card border border-white/10 shadow-2xl shadow-black/40 overflow-hidden z-50"
                             style="display:none;">
                            <div class="py-1.5">
                                <div class="px-3 py-1.5">
                                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-widest">Appendices</span>
                                </div>
                                <div class="grid grid-cols-3 gap-1 px-3 pb-2">
                                    @foreach($appendices as $letter)
                                        <a href="{{ route('appendix', $letter) }}"
                                           @click="open = false"
                                           class="flex items-center justify-center gap-1 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white hover:bg-cyan-500/15 border border-transparent hover:border-cyan-500/20 transition-all
                                                  {{ request()->route('letter') === $letter ? 'text-cyan-400 bg-cyan-500/10 border-cyan-500/20' : '' }}">
                                            <span class="text-cyan-500/50 text-xs">§</span>{{ $letter }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- CTA + Mobile Toggle --}}
                <div class="flex items-center gap-2 flex-shrink-0">
                    <a href="{{ route('contact') }}"
                       class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-semibold text-white animated-gradient btn-glow transition-all">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                        Hire Me
                    </a>

                    {{-- Mobile hamburger --}}
                    <button @click="mobileOpen = !mobileOpen"
                            class="lg:hidden w-9 h-9 flex flex-col items-center justify-center gap-1.5 rounded-lg hover:bg-white/5 transition-all">
                        <span class="w-5 h-0.5 bg-slate-300 rounded transition-all"
                              :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"></span>
                        <span class="w-5 h-0.5 bg-slate-300 rounded transition-all"
                              :class="mobileOpen ? 'opacity-0' : ''"></span>
                        <span class="w-5 h-0.5 bg-slate-300 rounded transition-all"
                              :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"></span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden glass-card border-t border-white/10 max-h-[80vh] overflow-y-auto">
            <div class="px-4 py-3 space-y-1">

                {{-- Home --}}
                <a href="{{ route('home') }}"
                   @click="mobileOpen = false"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all
                          {{ request()->routeIs('home') ? 'text-brand-400 bg-brand-500/10' : '' }}">
                    <i class="fa-solid fa-house w-4 text-brand-400 text-xs"></i>
                    Home
                </a>

                {{-- Mobile HOME dropdown accordion --}}
                <div x-data="{ homeOpen: false }">
                    <button @click="homeOpen = !homeOpen"
                            class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-file-lines w-4 text-brand-400 text-xs"></i>
                            Home
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-500 transition-transform" :class="homeOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="homeOpen" x-collapse class="pl-4 space-y-0.5 mt-1">
                        @foreach($homeDropdown as $item)
                            <a href="{{ route($item['route']) }}"
                               @click="mobileOpen = false"
                               class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-white hover:bg-brand-500/10 transition-all
                                      {{ request()->routeIs($item['route']) ? 'text-brand-400 bg-brand-500/10' : '' }}">
                                <i class="fa-solid {{ $item['icon'] }} text-brand-400/70 text-xs w-3"></i>
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Regular links --}}
                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       @click="mobileOpen = false"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all
                              {{ request()->routeIs($link['route']) ? 'text-brand-400 bg-brand-500/10' : '' }}">
                        <i class="fa-solid {{ $link['icon'] }} w-4 text-brand-400 text-xs"></i>
                        {{ $link['label'] }}
                    </a>
                @endforeach

                {{-- Mobile CHAPTERS I–IV accordion --}}
                <div x-data="{ chapOpen: false }" class="border-t border-white/10 pt-1 mt-1">
                    <button @click="chapOpen = !chapOpen"
                            class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-book-open w-4 text-purple-400 text-xs"></i>
                            Chapters
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-500 transition-transform" :class="chapOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="chapOpen" x-collapse class="pl-4 space-y-0.5 mt-1">
                        @foreach($chapterLinks as $i => $ch)
                            <a href="{{ route($ch['route']) }}"
                               @click="mobileOpen = false"
                               class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs text-slate-400 hover:text-white hover:bg-purple-500/10 transition-all
                                      {{ request()->routeIs($ch['route']) ? 'text-purple-400 bg-purple-500/10' : '' }}">
                                <span class="w-5 h-5 rounded bg-purple-500/10 flex items-center justify-center text-purple-400 font-bold text-xs flex-shrink-0">
                                    {{ ['I','II','III','IV'][$i] }}
                                </span>
                                {{ $ch['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile Appendices accordion --}}
                <div x-data="{ appOpen: false }">
                    <button @click="appOpen = !appOpen"
                            class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        <span class="flex items-center gap-3">
                            <i class="fa-solid fa-folder-open w-4 text-cyan-400 text-xs"></i>
                            Appendices
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-500 transition-transform" :class="appOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="appOpen" x-collapse class="pl-4 mt-1">
                        <div class="grid grid-cols-4 gap-1.5 px-2 pb-2">
                            @foreach($appendices as $letter)
                                <a href="{{ route('appendix', $letter) }}"
                                   @click="mobileOpen = false"
                                   class="flex items-center justify-center py-2 rounded-lg text-xs font-medium text-slate-400 hover:text-white hover:bg-cyan-500/15 border border-white/5 hover:border-cyan-500/20 transition-all
                                          {{ request()->route('letter') === $letter ? 'text-cyan-400 bg-cyan-500/10' : '' }}">
                                    {{ $letter }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="pt-2 border-t border-white/10">
                    <a href="{{ route('contact') }}"
                       class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg text-sm font-semibold text-white animated-gradient">
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                        Hire Me
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="border-t border-white/10 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- Brand --}}
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl animated-gradient flex items-center justify-center text-white font-bold">AN</div>
                        <div>
                            <p class="font-poppins font-semibold text-white text-sm">Angie</p>
                            <p class="text-xs text-slate-400">OJT Student</p>
                        </div>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        A passionate IT student currently undergoing on-the-job training, building real-world web solutions.
                    </p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="font-poppins font-semibold text-white mb-4 text-sm uppercase tracking-wider">Quick Links</h4>
                    <ul class="space-y-2">
                        @foreach($navLinks as $link)
                            <li>
                                <a href="{{ route($link['route']) }}"
                                   class="text-slate-400 hover:text-brand-400 text-sm transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-chevron-right text-xs text-brand-500"></i>
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Connect --}}
                <div>
                    <h4 class="font-poppins font-semibold text-white mb-4 text-sm uppercase tracking-wider">Connect</h4>
                    <p class="text-slate-400 text-sm mb-4">OMSC · Occidental Mindoro State College<br>Bachelor of Science in Information Technology</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-lg glass-card flex items-center justify-center text-slate-400 hover:text-brand-400 hover:border-brand-500/50 transition-all">
                            <i class="fab fa-github text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg glass-card flex items-center justify-center text-slate-400 hover:text-brand-400 hover:border-brand-500/50 transition-all">
                            <i class="fab fa-linkedin text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg glass-card flex items-center justify-center text-slate-400 hover:text-brand-400 hover:border-brand-500/50 transition-all">
                            <i class="fab fa-facebook text-sm"></i>
                        </a>
                        <a href="mailto:your.email@example.com" class="w-9 h-9 rounded-lg glass-card flex items-center justify-center text-slate-400 hover:text-brand-400 hover:border-brand-500/50 transition-all">
                            <i class="fas fa-envelope text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-slate-500 text-xs">
                    © {{ date('Y') }} Angie.</i> 
                </p>
                <p class="text-slate-500 text-xs">
                    OJT Portfolio · BSIT · OMSC
                </p>
            </div>
        </div>
    </footer>

    {{-- AOS Init --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60,
        });
    </script>

    @yield('scripts')
</body>
</html>
