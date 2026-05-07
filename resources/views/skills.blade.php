@extends('layouts.app')

@section('title', 'Skills | David Russel Prado')

@section('styles')
<style>
    .skill-bar-track {
        height: 8px;
        background: rgba(255,255,255,0.06);
        border-radius: 4px;
        overflow: hidden;
    }
    .skill-bar-fill {
        height: 100%;
        border-radius: 4px;
        width: 0;
        transition: width 1.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .skill-icon-card {
        transition: all 0.3s ease;
    }
    .skill-icon-card:hover {
        transform: translateY(-6px) scale(1.05);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .category-tab.active {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        border-color: transparent;
    }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-purple-600/5 to-transparent pointer-events-none"></div>
    <p class="text-purple-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">What I can do</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        My <span class="gradient-text">Skills</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        A comprehensive look at the technical and soft skills I've developed through academics, personal projects, and OJT.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8" x-data="{ activeCategory: 'all' }">
    <div class="max-w-6xl mx-auto space-y-16">

        {{-- Skill Icons Grid --}}
        <div data-aos="fade-up">
            <div class="text-center mb-10">
                <h2 class="font-poppins font-semibold text-2xl text-white mb-2">Technologies I Work With</h2>
                <p class="text-slate-400 text-sm">Tools and technologies from my daily workflow</p>
            </div>

            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4">
                @php
                    $techIcons = [
                        ['name' => 'Laravel',    'icon' => 'fab fa-laravel',       'color' => '#FF2D20', 'level' => 'Advanced'],
                        ['name' => 'PHP',        'icon' => 'fab fa-php',           'color' => '#777BB4', 'level' => 'Advanced'],
                        ['name' => 'HTML5',      'icon' => 'fab fa-html5',         'color' => '#E34F26', 'level' => 'Advanced'],
                        ['name' => 'CSS3',       'icon' => 'fab fa-css3-alt',      'color' => '#1572B6', 'level' => 'Advanced'],
                        ['name' => 'JavaScript', 'icon' => 'fab fa-js',            'color' => '#F7DF1E', 'level' => 'Intermediate'],
                        ['name' => 'MySQL',      'icon' => 'fas fa-database',      'color' => '#4479A1', 'level' => 'Intermediate'],
                        ['name' => 'Git',        'icon' => 'fab fa-git-alt',       'color' => '#F05032', 'level' => 'Intermediate'],
                        ['name' => 'GitHub',     'icon' => 'fab fa-github',        'color' => '#ffffff', 'level' => 'Intermediate'],
                        ['name' => 'Bootstrap',  'icon' => 'fab fa-bootstrap',     'color' => '#7952B3', 'level' => 'Advanced'],
                        ['name' => 'Tailwind',   'icon' => 'fas fa-wind',          'color' => '#06B6D4', 'level' => 'Advanced'],
                        ['name' => 'Linux',      'icon' => 'fab fa-linux',         'color' => '#FCC624', 'level' => 'Basic'],
                        ['name' => 'VS Code',    'icon' => 'fas fa-code',          'color' => '#007ACC', 'level' => 'Advanced'],
                        ['name' => 'Figma',      'icon' => 'fab fa-figma',         'color' => '#F24E1E', 'level' => 'Basic'],
                        ['name' => 'Node.js',    'icon' => 'fab fa-node-js',       'color' => '#339933', 'level' => 'Basic'],
                        ['name' => 'WordPress',  'icon' => 'fab fa-wordpress',     'color' => '#21759B', 'level' => 'Intermediate'],
                        ['name' => 'Postman',    'icon' => 'fas fa-paper-plane',   'color' => '#FF6C37', 'level' => 'Intermediate'],
                    ];
                @endphp
                @foreach($techIcons as $i => $tech)
                    <div class="skill-icon-card glass-card border border-white/10 rounded-2xl p-3 flex flex-col items-center gap-2 cursor-default group"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 8) * 40 }}"
                         title="{{ $tech['name'] }} — {{ $tech['level'] }}">
                        <i class="{{ $tech['icon'] }} text-2xl group-hover:scale-110 transition-transform"
                           style="color: {{ $tech['color'] }}"></i>
                        <span class="text-slate-400 text-xs text-center leading-tight">{{ $tech['name'] }}</span>
                        <span class="text-xs px-1.5 py-0.5 rounded-full
                            {{ $tech['level'] === 'Advanced' ? 'bg-green-500/10 text-green-400' :
                               ($tech['level'] === 'Intermediate' ? 'bg-blue-500/10 text-blue-400' : 'bg-slate-500/10 text-slate-400') }}">
                            {{ $tech['level'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Proficiency Bars --}}
        <div data-aos="fade-up">
            <div class="text-center mb-10">
                <h2 class="font-poppins font-semibold text-2xl text-white mb-2">Skill Proficiency</h2>
                <p class="text-slate-400 text-sm">Self-assessed skill levels based on experience and projects</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $proficiencies = [
                        // Backend
                        ['name' => 'Laravel Framework',     'pct' => 85, 'category' => 'Backend',   'color' => '#FF2D20'],
                        ['name' => 'PHP',                   'pct' => 82, 'category' => 'Backend',   'color' => '#777BB4'],
                        ['name' => 'MySQL / SQL',           'pct' => 75, 'category' => 'Database',  'color' => '#4479A1'],
                        ['name' => 'RESTful APIs',          'pct' => 70, 'category' => 'Backend',   'color' => '#6366f1'],
                        // Frontend
                        ['name' => 'HTML5 & CSS3',          'pct' => 90, 'category' => 'Frontend',  'color' => '#E34F26'],
                        ['name' => 'Tailwind CSS',          'pct' => 88, 'category' => 'Frontend',  'color' => '#06B6D4'],
                        ['name' => 'Bootstrap',             'pct' => 85, 'category' => 'Frontend',  'color' => '#7952B3'],
                        ['name' => 'JavaScript',            'pct' => 68, 'category' => 'Frontend',  'color' => '#F7DF1E'],
                        // Tools
                        ['name' => 'Git & GitHub',          'pct' => 72, 'category' => 'Tools',     'color' => '#F05032'],
                        ['name' => 'VS Code',               'pct' => 92, 'category' => 'Tools',     'color' => '#007ACC'],
                    ];
                @endphp
                @foreach($proficiencies as $i => $skill)
                    <div class="glass-card border border-white/10 rounded-2xl p-5"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 60 }}">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full" style="background: {{ $skill['color'] }}"></span>
                                <span class="text-slate-200 text-sm font-medium">{{ $skill['name'] }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full bg-white/5 text-slate-500 border border-white/10">{{ $skill['category'] }}</span>
                            </div>
                            <span class="font-poppins font-bold text-white text-sm">{{ $skill['pct'] }}%</span>
                        </div>
                        <div class="skill-bar-track">
                            <div class="skill-bar-fill" data-percent="{{ $skill['pct'] }}" style="background: linear-gradient(90deg, {{ $skill['color'] }}, {{ $skill['color'] }}88);"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Soft Skills --}}
        <div data-aos="fade-up">
            <div class="text-center mb-10">
                <h2 class="font-poppins font-semibold text-2xl text-white mb-2">Soft Skills</h2>
                <p class="text-slate-400 text-sm">Professional and interpersonal skills developed through training</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $softSkills = [
                        ['icon' => 'fa-comments',       'title' => 'Communication',       'desc' => 'Clear verbal and written communication in professional settings.',          'color' => 'from-blue-600 to-blue-500'],
                        ['icon' => 'fa-users',          'title' => 'Teamwork',            'desc' => 'Collaborating effectively with team members toward shared goals.',           'color' => 'from-green-600 to-green-500'],
                        ['icon' => 'fa-puzzle-piece',   'title' => 'Problem Solving',     'desc' => 'Analyzing challenges and developing creative, effective solutions.',         'color' => 'from-orange-600 to-orange-500'],
                        ['icon' => 'fa-clock',          'title' => 'Time Management',     'desc' => 'Prioritizing tasks and meeting deadlines in a fast-paced environment.',      'color' => 'from-purple-600 to-purple-500'],
                        ['icon' => 'fa-brain',          'title' => 'Critical Thinking',   'desc' => 'Logical analysis of situations and making data-driven decisions.',           'color' => 'from-pink-600 to-pink-500'],
                        ['icon' => 'fa-book-open',      'title' => 'Adaptability',        'desc' => 'Quickly learning and adapting to new technologies and environments.',        'color' => 'from-cyan-600 to-cyan-500'],
                        ['icon' => 'fa-bullseye',       'title' => 'Attention to Detail', 'desc' => 'Precise and thorough approach to writing clean, reliable code.',             'color' => 'from-red-600 to-red-500'],
                        ['icon' => 'fa-handshake',      'title' => 'Professionalism',     'desc' => 'Maintaining a professional attitude and work ethic at all times.',           'color' => 'from-emerald-600 to-emerald-500'],
                    ];
                @endphp
                @foreach($softSkills as $i => $skill)
                    <div class="glass-card border border-white/10 hover:border-brand-500/30 rounded-2xl p-5 text-center transition-all hover:-translate-y-1 hover:shadow-lg"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 60 }}">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $skill['color'] }} flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fa-solid {{ $skill['icon'] }} text-white text-lg"></i>
                        </div>
                        <h4 class="font-poppins font-semibold text-white text-sm mb-2">{{ $skill['title'] }}</h4>
                        <p class="text-slate-400 text-xs leading-relaxed">{{ $skill['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Certifications/Learning --}}
        <div data-aos="fade-up">
            <div class="text-center mb-10">
                <h2 class="font-poppins font-semibold text-2xl text-white mb-2">Certifications & Courses</h2>
                <p class="text-slate-400 text-sm">Continuous learning and professional development</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @php
                    $certs = [
                        ['title' => 'Laravel Certification', 'provider' => 'Self-Study / Udemy',  'year' => '2024', 'icon' => 'fab fa-laravel',  'color' => 'text-red-400',    'bg' => 'from-red-600/15 to-red-500/5',    'status' => 'Completed'],
                        ['title' => 'Web Development Bootcamp', 'provider' => 'Online Course',   'year' => '2023', 'icon' => 'fas fa-globe',    'color' => 'text-blue-400',   'bg' => 'from-blue-600/15 to-blue-500/5',  'status' => 'Completed'],
                        ['title' => 'Git & GitHub Essentials', 'provider' => 'GitHub Learning',  'year' => '2024', 'icon' => 'fab fa-github',   'color' => 'text-white',      'bg' => 'from-gray-600/15 to-gray-500/5',  'status' => 'Completed'],
                        ['title' => 'MySQL for Beginners',    'provider' => 'MySQL Tutorials',   'year' => '2023', 'icon' => 'fas fa-database', 'color' => 'text-cyan-400',   'bg' => 'from-cyan-600/15 to-cyan-500/5',  'status' => 'Completed'],
                        ['title' => 'Responsive Web Design',  'provider' => 'freeCodeCamp',      'year' => '2023', 'icon' => 'fas fa-mobile',   'color' => 'text-green-400',  'bg' => 'from-green-600/15 to-green-500/5','status' => 'Completed'],
                        ['title' => 'JavaScript Algorithms',  'provider' => 'freeCodeCamp',      'year' => '2024', 'icon' => 'fab fa-js',       'color' => 'text-yellow-400', 'bg' => 'from-yellow-600/15 to-yellow-500/5','status' => 'In Progress'],
                    ];
                @endphp
                @foreach($certs as $i => $cert)
                    <div class="glass-card border border-white/10 hover:border-brand-500/30 rounded-2xl p-5 transition-all hover:-translate-y-1"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $cert['bg'] }} border border-white/10 flex items-center justify-center flex-shrink-0">
                                <i class="{{ $cert['icon'] }} {{ $cert['color'] }} text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 mb-1">
                                    <h4 class="font-semibold text-white text-sm leading-snug">{{ $cert['title'] }}</h4>
                                    <span class="flex-shrink-0 px-2 py-0.5 rounded-full text-xs
                                        {{ $cert['status'] === 'Completed' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                                        {{ $cert['status'] }}
                                    </span>
                                </div>
                                <p class="text-slate-500 text-xs">{{ $cert['provider'] }}</p>
                                <p class="text-slate-600 text-xs mt-0.5">{{ $cert['year'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    const skillBars = document.querySelectorAll('.skill-bar-fill');
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.width = entry.target.dataset.percent + '%';
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    skillBars.forEach(b => skillObserver.observe(b));
</script>
@endsection
