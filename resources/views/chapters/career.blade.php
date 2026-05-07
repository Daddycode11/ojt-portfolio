@extends('layouts.app')
@section('title', 'Career Plan | Angie')

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-600/5 to-transparent pointer-events-none"></div>
    <p class="text-emerald-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Front Matter</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        Career <span class="gradient-text">Plan</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        My roadmap from OJT student to accomplished IT professional.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto space-y-8">

        {{-- Vision --}}
        <div class="glass-card border border-emerald-500/20 rounded-3xl p-8 sm:p-10" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-600 to-emerald-500 flex items-center justify-center shadow-xl">
                    <i class="fa-solid fa-road text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="font-poppins font-bold text-xl text-white">My Career Vision</h2>
                    <p class="text-slate-500 text-xs">Where I'm headed and how I'll get there</p>
                </div>
            </div>
            <p class="text-slate-300 text-sm leading-relaxed">
                My career goal is to become a <strong class="text-emerald-400">full-stack web developer</strong> and eventually
                a <strong class="text-brand-400">software architect</strong> who designs scalable, impactful digital solutions.
                I aim to work in a dynamic tech environment where I can continuously grow, contribute meaningfully, and eventually
                lead development teams. Long-term, I aspire to build technology that creates positive impact in my community and beyond.
            </p>
        </div>

        {{-- Career Timeline --}}
        <div data-aos="fade-up">
            <h3 class="font-poppins font-semibold text-xl text-white mb-6 flex items-center gap-2">
                <i class="fa-solid fa-timeline text-emerald-400"></i>
                Career Roadmap
            </h3>

            <div class="relative pl-12">
                <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-gradient-to-b from-emerald-500 via-brand-500 to-transparent"></div>

                @php
                    $milestones = [
                        [
                            'period'  => '2025 – Present',
                            'title'   => 'Complete OJT & Graduate',
                            'desc'    => 'Successfully complete the On-the-Job Training program, apply all learnings, and graduate with a Bachelor of Science in Information Technology.',
                            'status'  => 'current',
                            'icon'    => 'fa-graduation-cap',
                            'color'   => 'from-emerald-600 to-emerald-500',
                        ],
                        [
                            'period'  => '2025 – 2026',
                            'title'   => 'Junior Web Developer',
                            'desc'    => 'Secure a junior developer position at a reputable tech company or software firm. Focus on mastering Laravel, RESTful APIs, and modern frontend frameworks like Vue.js or React.',
                            'status'  => 'planned',
                            'icon'    => 'fa-laptop-code',
                            'color'   => 'from-brand-600 to-brand-500',
                        ],
                        [
                            'period'  => '2026 – 2028',
                            'title'   => 'Mid-Level Developer & Specialization',
                            'desc'    => 'Grow into a mid-level developer role with expertise in full-stack development. Pursue certifications in cloud technologies (AWS/Azure) and DevOps practices.',
                            'status'  => 'planned',
                            'icon'    => 'fa-code-branch',
                            'color'   => 'from-cyan-600 to-cyan-500',
                        ],
                        [
                            'period'  => '2028 – 2030',
                            'title'   => 'Senior Developer / Tech Lead',
                            'desc'    => 'Advance to a senior developer or tech lead position. Mentor junior developers, lead project teams, and contribute to system architecture decisions.',
                            'status'  => 'planned',
                            'icon'    => 'fa-users-gear',
                            'color'   => 'from-purple-600 to-purple-500',
                        ],
                        [
                            'period'  => '2030+',
                            'title'   => 'Software Architect / Entrepreneur',
                            'desc'    => 'Transition into a software architect role or found a tech startup. Create meaningful digital products that solve local and global problems.',
                            'status'  => 'dream',
                            'icon'    => 'fa-rocket',
                            'color'   => 'from-orange-600 to-orange-500',
                        ],
                    ];
                @endphp

                @foreach($milestones as $i => $m)
                    <div class="relative mb-6" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="absolute -left-[33px] top-3 w-3 h-3 rounded-full bg-gradient-to-br {{ $m['color'] }} border-2 border-navy-900 shadow-lg"></div>
                        <div class="glass-card border {{ $m['status'] === 'current' ? 'border-emerald-500/30' : 'border-white/10' }} rounded-2xl p-5 hover:border-brand-500/30 transition-all">
                            <div class="flex flex-wrap items-start justify-between gap-2 mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $m['color'] }} flex items-center justify-center flex-shrink-0 shadow-md">
                                        <i class="fa-solid {{ $m['icon'] }} text-white text-xs"></i>
                                    </div>
                                    <h4 class="font-poppins font-semibold text-white text-base">{{ $m['title'] }}</h4>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs
                                        {{ $m['status'] === 'current' ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/20' :
                                           ($m['status'] === 'dream' ? 'bg-orange-500/15 text-orange-400 border border-orange-500/20' : 'bg-slate-500/15 text-slate-400 border border-slate-500/20') }}">
                                        {{ ucfirst($m['status']) }}
                                    </span>
                                    <span class="text-slate-500 text-xs">{{ $m['period'] }}</span>
                                </div>
                            </div>
                            <p class="text-slate-400 text-xs leading-relaxed pl-12">{{ $m['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Skills to Develop --}}
       <!--  <div class="glass-card border border-white/10 rounded-3xl p-8" data-aos="fade-up">
            <h3 class="font-poppins font-semibold text-lg text-white mb-5 flex items-center gap-2">
                <i class="fa-solid fa-bullseye text-brand-400"></i>
                Skills I Plan to Develop
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @php
                    $futureSkills = [
                        ['label' => 'Vue.js / React',   'icon' => 'fab fa-vuejs',       'color' => 'text-green-400'],
                        ['label' => 'AWS / Cloud',      'icon' => 'fab fa-aws',         'color' => 'text-orange-400'],
                        ['label' => 'Docker / DevOps',  'icon' => 'fab fa-docker',      'color' => 'text-blue-400'],
                        ['label' => 'GraphQL',          'icon' => 'fas fa-diagram-project','color' => 'text-pink-400'],
                        ['label' => 'Python / ML',      'icon' => 'fab fa-python',      'color' => 'text-yellow-400'],
                        ['label' => 'System Design',    'icon' => 'fas fa-sitemap',     'color' => 'text-cyan-400'],
                    ];
                @endphp
                @foreach($futureSkills as $fs)
                    <div class="flex items-center gap-2.5 p-3 rounded-xl glass-card border border-white/10 hover:border-brand-500/30 transition-all">
                        <i class="{{ $fs['icon'] }} {{ $fs['color'] }} text-lg"></i>
                        <span class="text-slate-300 text-xs font-medium">{{ $fs['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div> -->

        <div class="flex items-center justify-between">
            <a href="{{ route('chapter.philosophy') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> Personal Philosophy
            </a>
            <a href="{{ route('home') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                Back to Home <i class="fa-solid fa-house text-xs"></i>
            </a>
        </div>
    </div>
</div>
@endsection
