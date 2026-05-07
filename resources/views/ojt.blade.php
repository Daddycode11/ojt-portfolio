@extends('layouts.app')

@section('title', 'OJT Experience | David Russel Prado')

@section('styles')
<style>
    .week-card { transition: all 0.3s ease; }
    .week-card:hover {
        border-color: rgba(99,102,241,0.4) !important;
        transform: translateX(6px);
    }

    .company-card {
        background: linear-gradient(135deg, rgba(99,102,241,0.08) 0%, rgba(6,182,212,0.05) 100%);
        border: 1px solid rgba(99,102,241,0.2);
    }

    .progress-bar {
        height: 6px;
        background: rgba(255,255,255,0.06);
        border-radius: 3px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #6366f1, #06b6d4);
        border-radius: 3px;
        transition: width 1.5s ease-out;
    }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-cyan-600/5 to-transparent pointer-events-none"></div>
    <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Professional Experience</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        On-the-Job <span class="gradient-text">Training</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        My OJT experience — where academic knowledge meets real-world professional practice.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto space-y-12">

        {{-- Company Overview --}}
        <div class="company-card rounded-3xl p-8 sm:p-10" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-4">
                        <i class="fa-solid fa-building"></i> Training Establishment
                    </span>
                    <h2 class="font-poppins font-bold text-2xl sm:text-3xl text-white mb-3">
                        [Your Company Name]
                    </h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        A brief description of the company or institution where you conducted your OJT.
                        Describe what the organization does, its industry, and its mission.
                        This is your training establishment where you applied your IT knowledge and skills.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $tags = ['Web Development', 'PHP', 'Laravel', 'MySQL', 'Professional Setting'];
                        @endphp
                        @foreach($tags as $tag)
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-brand-500/10 text-brand-400 border border-brand-500/20">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    @php
                        $ojtStats = [
                            ['label' => 'Start Date',    'value' => 'March 2026',     'icon' => 'fa-calendar-plus',  'color' => 'from-brand-600 to-brand-500'],
                            ['label' => 'End Date',      'value' => 'Apr 2026',     'icon' => 'fa-calendar-check', 'color' => 'from-cyan-600 to-cyan-500'],
                            ['label' => 'Total Hours',   'value' => '486 hrs',      'icon' => 'fa-clock',          'color' => 'from-purple-600 to-purple-500'],
                            ['label' => 'Position',      'value' => 'IT Trainee',   'icon' => 'fa-id-badge',       'color' => 'from-emerald-600 to-emerald-500'],
                        ];
                    @endphp
                    @foreach($ojtStats as $s)
                        <div class="glass-card border border-white/10 rounded-2xl p-4 text-center">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $s['color'] }} flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <i class="fa-solid {{ $s['icon'] }} text-white text-sm"></i>
                            </div>
                            <p class="font-poppins font-bold text-white text-base">{{ $s['value'] }}</p>
                            <p class="text-slate-500 text-xs mt-0.5">{{ $s['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- OJT Progress --}}
        <div data-aos="fade-up">
            <h3 class="font-poppins font-semibold text-xl text-white mb-6 flex items-center gap-2">
                <i class="fa-solid fa-chart-line text-brand-400"></i>
                Training Progress
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $progress = [
                        ['label' => 'Hours Completed', 'value' => 486, 'total' => 486, 'pct' => 100, 'color' => '#6366f1'],
                        ['label' => 'Weekly Reports',  'value' => 12,  'total' => 12,  'pct' => 100, 'color' => '#06b6d4'],
                        ['label' => 'Projects Done',   'value' => 8,   'total' => 10,  'pct' => 80,  'color' => '#a855f7'],
                        ['label' => 'Tasks Completed', 'value' => 45,  'total' => 50,  'pct' => 90,  'color' => '#22c55e'],
                    ];
                @endphp
                @foreach($progress as $p)
                    <div class="glass-card border border-white/10 rounded-2xl p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-slate-300 text-sm font-medium">{{ $p['label'] }}</span>
                            <span class="font-poppins font-bold text-white text-sm">{{ $p['value'] }}/{{ $p['total'] }}</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 0%;" data-width="{{ $p['pct'] }}%" data-color="{{ $p['color'] }}"></div>
                        </div>
                        <p class="text-slate-500 text-xs mt-1.5 text-right">{{ $p['pct'] }}% complete</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Responsibilities --}}
        <div data-aos="fade-up">
            <h3 class="font-poppins font-semibold text-xl text-white mb-6 flex items-center gap-2">
                <i class="fa-solid fa-list-check text-brand-400"></i>
                Roles & Responsibilities
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $responsibilities = [
                        ['icon' => 'fa-code', 'title' => 'Web Development', 'desc' => 'Developed and maintained web applications using Laravel and PHP for the company\'s internal systems.', 'color' => 'text-brand-400', 'bg' => 'from-brand-600/15 to-brand-500/5'],
                        ['icon' => 'fa-database', 'title' => 'Database Management', 'desc' => 'Designed and managed MySQL databases, wrote optimized queries, and maintained data integrity.', 'color' => 'text-cyan-400', 'bg' => 'from-cyan-600/15 to-cyan-500/5'],
                        ['icon' => 'fa-bug', 'title' => 'Bug Fixing & Testing', 'desc' => 'Identified and resolved software bugs, conducted testing to ensure application reliability.', 'color' => 'text-red-400', 'bg' => 'from-red-600/15 to-red-500/5'],
                        ['icon' => 'fa-file-code', 'title' => 'Documentation', 'desc' => 'Created technical documentation, user manuals, and maintained code documentation standards.', 'color' => 'text-purple-400', 'bg' => 'from-purple-600/15 to-purple-500/5'],
                        ['icon' => 'fa-users', 'title' => 'Team Collaboration', 'desc' => 'Worked alongside the development team, participated in meetings and contributed to project planning.', 'color' => 'text-green-400', 'bg' => 'from-green-600/15 to-green-500/5'],
                        ['icon' => 'fa-shield', 'title' => 'Security Implementation', 'desc' => 'Applied security best practices including input validation, authentication, and data protection.', 'color' => 'text-orange-400', 'bg' => 'from-orange-600/15 to-orange-500/5'],
                    ];
                @endphp
                @foreach($responsibilities as $i => $r)
                    <div class="glass-card border border-white/10 hover:border-brand-500/30 rounded-2xl p-5 transition-all hover:-translate-y-1 hover:shadow-lg"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $r['bg'] }} border border-white/5 flex items-center justify-center mb-4">
                            <i class="fa-solid {{ $r['icon'] }} {{ $r['color'] }} text-lg"></i>
                        </div>
                        <h4 class="font-poppins font-semibold text-white text-sm mb-2">{{ $r['title'] }}</h4>
                        <p class="text-slate-400 text-xs leading-relaxed">{{ $r['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Weekly Reports / Learnings --}}
        <div data-aos="fade-up">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-poppins font-semibold text-xl text-white flex items-center gap-2">
                    <i class="fa-solid fa-calendar-week text-brand-400"></i>
                    Weekly Reports & Reflections
                </h3>
                <span class="text-xs text-slate-500">12 Weeks Total</span>
            </div>

            <div class="space-y-3">
                @php
                    $weeks = [
                        ['week' => 1,  'dates' => 'Jan 06 – Jan 10',  'focus' => 'Orientation & Setup',          'desc' => 'Company orientation, workspace setup, introduction to the team, tools, and workflows. Familiarized with the existing codebase and development environment.',                         'hrs' => 40, 'highlight' => true],
                        ['week' => 2,  'dates' => 'Jan 13 – Jan 17',  'focus' => 'Laravel Project Setup',        'desc' => 'Set up the Laravel development environment, explored the project structure, configured database connections, and ran initial migrations.',                                        'hrs' => 40, 'highlight' => false],
                        ['week' => 3,  'dates' => 'Jan 20 – Jan 24',  'focus' => 'CRUD Development',             'desc' => 'Developed CRUD operations for core modules. Learned about Eloquent ORM, form validation, and blade templating in a professional context.',                                       'hrs' => 40, 'highlight' => false],
                        ['week' => 4,  'dates' => 'Jan 27 – Jan 31',  'focus' => 'Authentication & Authorization','desc' => 'Implemented user authentication using Laravel Breeze and role-based access control. Learned about middleware and route protection.',                                             'hrs' => 40, 'highlight' => false],
                        ['week' => 5,  'dates' => 'Feb 03 – Feb 07',  'focus' => 'API Development',              'desc' => 'Started working on RESTful API endpoints. Learned about JSON responses, API authentication with Sanctum, and API testing with Postman.',                                    'hrs' => 40, 'highlight' => false],
                        ['week' => 6,  'dates' => 'Feb 10 – Feb 14',  'focus' => 'Frontend Development',        'desc' => 'Worked on responsive frontend designs using Tailwind CSS. Implemented interactive elements with Alpine.js and improved UI/UX of existing features.',                          'hrs' => 40, 'highlight' => false],
                        ['week' => 7,  'dates' => 'Feb 17 – Feb 21',  'focus' => 'Database Optimization',       'desc' => 'Focused on optimizing database queries, adding indexes, and improving overall application performance. Learned about N+1 problem and eager loading.',                         'hrs' => 40, 'highlight' => false],
                        ['week' => 8,  'dates' => 'Feb 24 – Feb 28',  'focus' => 'Testing & Debugging',         'desc' => 'Wrote PHPUnit tests for critical features, performed debugging using Laravel Telescope, and resolved various bugs identified during testing.',                                'hrs' => 40, 'highlight' => false],
                        ['week' => 9,  'dates' => 'Mar 03 – Mar 07',  'focus' => 'File Management System',      'desc' => 'Built a file upload and management system using Laravel Storage. Implemented file validation, storage organization, and secure download features.',                           'hrs' => 40, 'highlight' => false],
                        ['week' => 10, 'dates' => 'Mar 10 – Mar 14',  'focus' => 'Reporting Module',            'desc' => 'Developed a reporting module with data visualization using Chart.js. Created exportable PDF and Excel reports using Laravel Excel and DomPDF packages.',                    'hrs' => 40, 'highlight' => false],
                        ['week' => 11, 'dates' => 'Mar 17 – Mar 21',  'focus' => 'Deployment & DevOps',         'desc' => 'Learned about deployment processes, server configuration, Git workflows in a team setting, and basic DevOps practices for web applications.',                                'hrs' => 40, 'highlight' => false],
                        ['week' => 12, 'dates' => 'Mar 24 – Mar 28',  'focus' => 'Final Project & Evaluation',  'desc' => 'Completed final project deliverables, prepared documentation, conducted code review, and received performance evaluation from supervisors.',                                 'hrs' => 46, 'highlight' => true],
                    ];
                @endphp

                @foreach($weeks as $w)
                    <div class="week-card glass-card border {{ $w['highlight'] ? 'border-brand-500/30' : 'border-white/10' }} rounded-2xl overflow-hidden"
                         x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-white/[0.02] transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl {{ $w['highlight'] ? 'animated-gradient' : 'bg-brand-600/15' }} flex items-center justify-center flex-shrink-0 shadow-md">
                                    <span class="font-poppins font-bold text-white text-xs">W{{ $w['week'] }}</span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="font-semibold text-white text-sm">{{ $w['focus'] }}</span>
                                        @if($w['highlight'])
                                            <span class="px-2 py-0.5 rounded-full text-xs bg-brand-500/15 text-brand-400 border border-brand-500/20">Featured</span>
                                        @endif
                                    </div>
                                    <span class="text-slate-500 text-xs">{{ $w['dates'] }} · {{ $w['hrs'] }} hours</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-down text-slate-500 text-sm transition-transform" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-collapse class="border-t border-white/10">
                            <div class="px-5 pb-5 pt-4">
                                <p class="text-slate-400 text-sm leading-relaxed">{{ $w['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Key Takeaways --}}
        <div class="glass-card border border-brand-500/20 rounded-3xl p-8 sm:p-10" data-aos="fade-up">
            <div class="text-center mb-8">
                <h3 class="font-poppins font-bold text-2xl text-white mb-2">Key Takeaways</h3>
                <p class="text-slate-400 text-sm">What I learned from my OJT experience</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $takeaways = [
                        'Professional coding standards and best practices in a real-world environment',
                        'Agile team workflows, Git version control, and collaborative development',
                        'Problem-solving under real business constraints and deadlines',
                        'Full-stack Laravel development from concept to deployment',
                        'Database design, optimization, and complex query writing',
                        'Effective communication and documentation in a professional setting',
                        'Self-learning and adapting to new technologies quickly',
                        'Code reviews, feedback integration, and iterative improvement',
                    ];
                @endphp
                @foreach($takeaways as $i => $t)
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-brand-500/5 border border-brand-500/10"
                         data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 50 }}">
                        <div class="w-5 h-5 rounded-full bg-brand-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-solid fa-check text-brand-400 text-xs"></i>
                        </div>
                        <span class="text-slate-300 text-sm">{{ $t }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    // Animate progress bars when in view
    const fills = document.querySelectorAll('.progress-fill');
    const barObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                el.style.width = el.dataset.width;
                el.style.background = `linear-gradient(90deg, ${el.dataset.color}, #06b6d4)`;
                barObserver.unobserve(el);
            }
        });
    }, { threshold: 0.3 });
    fills.forEach(f => barObserver.observe(f));
</script>
@endsection
