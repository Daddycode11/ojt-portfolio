@extends('layouts.app')

@section('title', 'About Me | David Russel Prado')

@section('styles')
<style>
    .timeline-line {
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #6366f1, #06b6d4, transparent);
    }

    .timeline-dot {
        width: 12px;
        height: 12px;
        background: linear-gradient(135deg, #6366f1, #06b6d4);
        border-radius: 50%;
        border: 2px solid #0a0f1e;
        box-shadow: 0 0 10px rgba(99,102,241,0.5);
        flex-shrink: 0;
        margin-top: 4px;
    }

    .profile-card {
        background: linear-gradient(135deg, rgba(99,102,241,0.08) 0%, rgba(6,182,212,0.05) 100%);
        border: 1px solid rgba(99,102,241,0.2);
    }

    .info-chip {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        transition: all 0.2s;
    }
    .info-chip:hover {
        border-color: rgba(99,102,241,0.4);
        background: rgba(99,102,241,0.05);
    }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-brand-600/5 to-transparent pointer-events-none"></div>
    <p class="text-brand-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Get to know me</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">About <span class="gradient-text">Me</span></h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        A passionate IT student from Occidental Mindoro State College on a journey to build meaningful digital solutions.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        {{-- Profile + Bio --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mb-16">

            {{-- Profile Card --}}
            <div class="lg:col-span-2" data-aos="fade-right">
                <div class="profile-card rounded-3xl p-8 text-center sticky top-24">

                    {{-- Avatar --}}
                    <div class="avatar-ring w-32 h-32 mx-auto mb-5">
                        <div class="w-full h-full rounded-full bg-navy-800 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=David+Russel+Prado&size=200&background=4f46e5&color=ffffff&font-size=0.35&bold=true"
                                 alt="Angie sample test"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    <h2 class="font-poppins font-bold text-xl text-white mb-1">Angie Test sample</h2>
                    <p class="text-brand-400 text-sm font-medium mb-1">BSIT Student · OJT Trainee</p>
                    <p class="text-slate-500 text-xs mb-6">Occidental Mindoro State College</p>

                    {{-- Status --}}
                    <div class="flex items-center justify-center gap-2 mb-6 px-4 py-2 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-medium">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        Available for opportunities
                    </div>

                    {{-- Info chips --}}
                    <div class="space-y-2.5 text-left">
                        @php
                            $info = [
                                ['icon' => 'fa-graduation-cap', 'label' => 'School',    'value' => 'OMSC',             'color' => 'text-brand-400'],
                                ['icon' => 'fa-book',           'label' => 'Course',    'value' => 'BSIT',             'color' => 'text-cyan-400'],
                                ['icon' => 'fa-location-dot',   'label' => 'Location',  'value' => 'Occidental Mindoro', 'color' => 'text-pink-400'],
                                ['icon' => 'fa-envelope',       'label' => 'Email',     'value' => 'your@email.com',   'color' => 'text-emerald-400'],
                                ['icon' => 'fa-code',           'label' => 'Focus',     'value' => 'Web Development',  'color' => 'text-purple-400'],
                            ];
                        @endphp
                        @foreach($info as $item)
                            <div class="info-chip rounded-xl px-4 py-2.5 flex items-center gap-3">
                                <i class="fa-solid {{ $item['icon'] }} {{ $item['color'] }} text-sm w-4 flex-shrink-0"></i>
                                <div class="min-w-0">
                                    <span class="text-slate-500 text-xs block">{{ $item['label'] }}</span>
                                    <span class="text-slate-200 text-xs font-medium truncate block">{{ $item['value'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Social Links --}}
                    <div class="flex justify-center gap-3 mt-6">
                        <a href="#" class="w-9 h-9 rounded-lg glass-card border border-white/10 flex items-center justify-center text-slate-400 hover:text-brand-400 hover:border-brand-500/50 transition-all">
                            <i class="fab fa-github text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg glass-card border border-white/10 flex items-center justify-center text-slate-400 hover:text-cyan-400 hover:border-cyan-500/50 transition-all">
                            <i class="fab fa-linkedin text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg glass-card border border-white/10 flex items-center justify-center text-slate-400 hover:text-blue-400 hover:border-blue-500/50 transition-all">
                            <i class="fab fa-facebook text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bio + Journey --}}
            <div class="lg:col-span-3 space-y-8" data-aos="fade-left">

                {{-- Bio --}}
                <div class="glass-card border border-white/10 rounded-2xl p-7">
                    <h3 class="font-poppins font-semibold text-lg text-white mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-user text-brand-400"></i>
                        Who I Am
                    </h3>
                    <div class="space-y-4 text-slate-400 text-sm leading-relaxed">
                        <p>
                            Hello! I'm <strong class="text-white">Angie test sample</strong>, a dedicated Bachelor of Science in Information Technology student
                            at <strong class="text-brand-400">Occidental Mindoro State College (OMSC)</strong>. I have a deep passion for web development
                            and creating digital solutions that solve real-world problems.
                        </p>
                        <p>
                            Currently undergoing my <strong class="text-cyan-400">On-the-Job Training (OJT)</strong>, I've had the incredible opportunity
                            to apply my academic knowledge in a professional environment. Every day brings new challenges and learnings that are
                            shaping me into a better developer and professional.
                        </p>
                        <p>
                            My primary focus is on <strong class="text-purple-400">full-stack web development</strong> using the Laravel framework for backend
                            and modern CSS frameworks for beautifully crafted frontends. I believe in writing clean, maintainable code and
                            always strive to follow best practices.
                        </p>
                    </div>
                </div>

                {{-- Personal Info --}}
                <div class="glass-card border border-white/10 rounded-2xl p-7">
                    <h3 class="font-poppins font-semibold text-lg text-white mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-id-card text-brand-400"></i>
                        Personal Details
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @php
                            $details = [
                                ['label' => 'Full Name',    'value' => 'Angie Test Test',      'icon' => 'fa-user'],
                                ['label' => 'Nickname',     'value' => 'Angie',           'icon' => 'fa-smile'],
                                ['label' => 'Age',          'value' => '20 years old',             'icon' => 'fa-cake-candles'],
                                ['label' => 'Nationality',  'value' => 'Filipino',                 'icon' => 'fa-flag'],
                                ['label' => 'Language',     'value' => 'Filipino, English',        'icon' => 'fa-language'],
                                ['label' => 'Hobbies',      'value' => 'Coding, Gaming, Reading',  'icon' => 'fa-heart'],
                            ];
                        @endphp
                        @foreach($details as $d)
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/5">
                                <div class="w-8 h-8 rounded-lg bg-brand-600/15 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid {{ $d['icon'] }} text-brand-400 text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500">{{ $d['label'] }}</p>
                                    <p class="text-sm text-slate-200 font-medium">{{ $d['value'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Values --}}
                <div class="glass-card border border-white/10 rounded-2xl p-7">
                    <h3 class="font-poppins font-semibold text-lg text-white mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-lightbulb text-brand-400"></i>
                        My Values & Approach
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        @php
                            $values = [
                                ['icon' => 'fa-bullseye', 'title' => 'Goal-Driven', 'desc' => 'I set clear targets and work systematically toward them.', 'color' => 'text-red-400', 'bg' => 'bg-red-500/10'],
                                ['icon' => 'fa-book-open', 'title' => 'Always Learning', 'desc' => 'Continuous improvement is my core principle.', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10'],
                                ['icon' => 'fa-users', 'title' => 'Team Player', 'desc' => 'Collaboration leads to better outcomes for everyone.', 'color' => 'text-green-400', 'bg' => 'bg-green-500/10'],
                            ];
                        @endphp
                        @foreach($values as $v)
                            <div class="text-center p-4 rounded-xl {{ $v['bg'] }} border border-white/5">
                                <div class="w-10 h-10 rounded-xl {{ $v['bg'] }} border border-white/10 flex items-center justify-center mx-auto mb-3">
                                    <i class="fa-solid {{ $v['icon'] }} {{ $v['color'] }} text-lg"></i>
                                </div>
                                <p class="font-semibold text-white text-sm mb-1">{{ $v['title'] }}</p>
                                <p class="text-slate-500 text-xs leading-snug">{{ $v['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Education Timeline --}}
        <div data-aos="fade-up">
            <div class="text-center mb-10">
                <p class="text-brand-400 text-sm font-semibold uppercase tracking-widest mb-2">Academic Journey</p>
                <h2 class="font-poppins font-bold text-3xl text-white">Education</h2>
            </div>

            <div class="relative pl-12">
                <div class="timeline-line"></div>

                @php
                    $education = [
                        [
                            'period'    => '2022 – Present',
                            'title'     => 'Bachelor of Science in Information Technology',
                            'school'    => 'Occidental Mindoro State College (OMSC)',
                            'desc'      => 'Currently in my 3rd year studying BSIT with a focus on web development, database systems, and software engineering. Currently undergoing OJT as part of the curriculum.',
                            'badge'     => 'Current',
                            'icon'      => 'fa-graduation-cap',
                            'delay'     => 0,
                        ],
                        [
                            'period'    => '2018 – 2022',
                            'title'     => 'Senior High School',
                            'school'    => 'Your High School Name',
                            'desc'      => 'Completed Senior High School with ICT / STEM strand. Developed foundational knowledge in computer science, programming, and technology.',
                            'badge'     => 'Completed',
                            'icon'      => 'fa-school',
                            'delay'     => 100,
                        ],
                        [
                            'period'    => '2012 – 2018',
                            'title'     => 'Elementary & Junior High School',
                            'school'    => 'Your School Name',
                            'desc'      => 'Built the foundational academic skills and developed early interest in computers and technology.',
                            'badge'     => 'Completed',
                            'icon'      => 'fa-book',
                            'delay'     => 200,
                        ],
                    ];
                @endphp

                @foreach($education as $edu)
                    <div class="relative mb-8" data-aos="fade-up" data-aos-delay="{{ $edu['delay'] }}">
                        <div class="timeline-dot absolute -left-[33px]"></div>
                        <div class="glass-card border border-white/10 hover:border-brand-500/30 rounded-2xl p-6 transition-all">
                            <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-brand-600/15 flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid {{ $edu['icon'] }} text-brand-400 text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-poppins font-semibold text-white text-base">{{ $edu['title'] }}</h4>
                                        <p class="text-brand-400 text-xs font-medium">{{ $edu['school'] }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $edu['badge'] === 'Current' ? 'bg-green-500/15 text-green-400 border border-green-500/20' : 'bg-slate-500/15 text-slate-400 border border-slate-500/20' }}">
                                        {{ $edu['badge'] }}
                                    </span>
                                    <span class="text-slate-500 text-xs">{{ $edu['period'] }}</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-sm leading-relaxed">{{ $edu['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- CTA --}}
       <!--  <div class="text-center mt-16" data-aos="fade-up">
            <div class="glass-card border border-brand-500/20 rounded-3xl p-10 max-w-2xl mx-auto">
                <div class="w-16 h-16 rounded-2xl animated-gradient flex items-center justify-center mx-auto mb-5 shadow-xl">
                    <i class="fa-solid fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="font-poppins font-bold text-2xl text-white mb-3">Let's Work Together</h3>
                <p class="text-slate-400 mb-6 text-sm">Interested in collaborating or have an opportunity? I'd love to connect and discuss how I can contribute.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}" class="flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow">
                        <i class="fa-solid fa-envelope text-xs"></i>
                        Get in Touch
                    </a>
                    <a href="{{ route('projects') }}" class="flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-slate-200 glass-card border border-white/10 hover:border-brand-500/40 transition-all">
                        <i class="fa-solid fa-eye text-xs text-brand-400"></i>
                        View My Work
                    </a>
                </div>
            </div>
        </div>
 -->
    </div>
</div>

@endsection
