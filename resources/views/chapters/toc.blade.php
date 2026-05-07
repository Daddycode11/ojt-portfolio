@extends('layouts.app')
@section('title', 'Table of Contents | Angie')

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-cyan-600/5 to-transparent pointer-events-none"></div>
    <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Front Matter</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        Table of <span class="gradient-text">Contents</span>
    </h1>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card border border-white/10 rounded-3xl p-8 sm:p-12" data-aos="fade-up">

            {{-- Header --}}
            <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-600 to-cyan-500 flex items-center justify-center shadow-xl">
                    <i class="fa-solid fa-list-ul text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="font-poppins font-bold text-xl text-white">Table of Contents</h2>
                    <p class="text-slate-500 text-xs">OJT Portfolio · Angie</p>
                </div>
            </div>

            <div class="space-y-8 text-sm">

                {{-- ── FRONT MATTER ── --}}
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3 flex items-center gap-2">
                        <span class="flex-1 h-px bg-white/10"></span>
                        Front Matter
                        <span class="flex-1 h-px bg-white/10"></span>
                    </p>
                    @php
                        $frontMatter = [
                            ['label' => 'Title Page',             'route' => 'home',                    'page' => 'i'],
                            ['label' => 'Acknowledgement',        'route' => 'chapter.acknowledgement', 'page' => 'ii'],
                            ['label' => 'Table of Contents',      'route' => 'chapter.toc',             'page' => 'iii'],
                            ['label' => 'Student Trainee Prayer', 'route' => 'chapter.prayer',          'page' => 'iv'],
                            ['label' => 'Personal Philosophy',    'route' => 'chapter.philosophy',      'page' => 'v'],
                            ['label' => 'Career Plan',            'route' => 'chapter.career',          'page' => 'vi'],
                        ];
                    @endphp
                    <div class="space-y-0.5">
                        @foreach($frontMatter as $item)
                            <a href="{{ route($item['route']) }}"
                               class="toc-row flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-brand-500/5 group transition-all">
                                <span class="w-6 text-right text-slate-500 text-xs font-mono flex-shrink-0 group-hover:text-brand-400">{{ $item['page'] }}</span>
                                <span class="flex-1 border-b border-dashed border-white/8 mx-2"></span>
                                <span class="text-slate-300 group-hover:text-white transition-colors flex-1 min-w-0">{{ $item['label'] }}</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-700 group-hover:text-brand-400 transition-colors flex-shrink-0"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- ── CHAPTER I ── --}}
                <div>
                    <a href="{{ route('chapter.one') }}"
                       class="flex items-center gap-3 mb-2 group">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-600 to-brand-500 flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-105 transition-transform">
                            <span class="text-white font-bold text-xs">I</span>
                        </div>
                        <span class="font-poppins font-bold text-white group-hover:text-brand-400 transition-colors">
                            CHAPTER I: INTRODUCTION
                        </span>
                        <span class="ml-auto text-slate-500 text-xs font-mono">1</span>
                    </a>
                    <div class="pl-11 space-y-0.5">
                        @foreach([
                            ['label' => 'A.   Importance of Internship',        'page' => '2'],
                            ['label' => 'B.   Objectives of Internship',         'page' => '3'],
                            ['label' => 'C.   Time and Place of the Internship', 'page' => '4'],
                        ] as $sub)
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg">
                                <span class="text-slate-400 flex-1">{{ $sub['label'] }}</span>
                                <span class="flex-shrink-0 w-24 border-b border-dashed border-white/10 mx-1"></span>
                                <span class="text-slate-500 text-xs font-mono flex-shrink-0 w-6 text-right">{{ $sub['page'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── CHAPTER II ── --}}
                <div>
                    <a href="{{ route('chapter.two') }}"
                       class="flex items-center gap-3 mb-2 group">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-600 to-cyan-500 flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-105 transition-transform">
                            <span class="text-white font-bold text-xs">II</span>
                        </div>
                        <span class="font-poppins font-bold text-white group-hover:text-cyan-400 transition-colors">
                            CHAPTER II: COMPANY PROFILE
                        </span>
                        <span class="ml-auto text-slate-500 text-xs font-mono">5</span>
                    </a>
                    <div class="pl-11 space-y-0.5">
                        @foreach([
                            ['label' => '1.   Nature of the Agency',                              'page' => '6'],
                            ['label' => '2.   Mission / Vision / Goal Statement',                 'page' => '7'],
                            ['label' => '3.   History / Background of the Agency with Pictures',  'page' => '8'],
                            ['label' => '4.   Organizational Structure',                          'page' => '10'],
                        ] as $sub)
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg">
                                <span class="text-slate-400 flex-1">{{ $sub['label'] }}</span>
                                <span class="flex-shrink-0 w-24 border-b border-dashed border-white/10 mx-1"></span>
                                <span class="text-slate-500 text-xs font-mono flex-shrink-0 w-6 text-right">{{ $sub['page'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── CHAPTER III ── --}}
                <div>
                    <a href="{{ route('chapter.three') }}"
                       class="flex items-center gap-3 mb-2 group">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-600 to-purple-500 flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-105 transition-transform">
                            <span class="text-white font-bold text-xs">III</span>
                        </div>
                        <span class="font-poppins font-bold text-white group-hover:text-purple-400 transition-colors">
                            CHAPTER III: WORK EXPERIENCES
                        </span>
                        <span class="ml-auto text-slate-500 text-xs font-mono">12</span>
                    </a>
                    <div class="pl-11 space-y-0.5">
                        @foreach([
                            ['label' => '1.   Weekly Accomplishment Report',  'page' => '13'],
                            ['label' => '2.   Daily Time Record',              'page' => '15'],
                            ['label' => '3.   Internship Progress Report',     'page' => '18'],
                            ['label' => '4.   Internship Analysis Report',     'page' => '20'],
                        ] as $sub)
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg">
                                <span class="text-slate-400 flex-1">{{ $sub['label'] }}</span>
                                <span class="flex-shrink-0 w-24 border-b border-dashed border-white/10 mx-1"></span>
                                <span class="text-slate-500 text-xs font-mono flex-shrink-0 w-6 text-right">{{ $sub['page'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── CHAPTER IV ── --}}
                <div>
                    <a href="{{ route('chapter.four') }}"
                       class="flex items-center gap-3 mb-2 group">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-600 to-emerald-500 flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-105 transition-transform">
                            <span class="text-white font-bold text-xs">IV</span>
                        </div>
                        <span class="font-poppins font-bold text-white group-hover:text-emerald-400 transition-colors">
                            CHAPTER IV: ASSESSMENT OF THE PRACTICUM PROGRAM
                        </span>
                        <span class="ml-auto text-slate-500 text-xs font-mono">22</span>
                    </a>
                    <div class="pl-11 space-y-0.5">
                        <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg">
                            <span class="text-slate-400 flex-1">1.   Student Internship Evaluation Form</span>
                            <span class="flex-shrink-0 w-24 border-b border-dashed border-white/10 mx-1"></span>
                            <span class="text-slate-500 text-xs font-mono flex-shrink-0 w-6 text-right">23</span>
                        </div>
                    </div>
                </div>

                {{-- ── APPENDICES ── --}}
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3 flex items-center gap-2">
                        <span class="flex-1 h-px bg-white/10"></span>
                        Appendices
                        <span class="flex-1 h-px bg-white/10"></span>
                    </p>
                    @php
                        $appendicesList = [
                            'A' => 'Evaluation Form (Registrar\'s Office)',
                            'B' => 'Photocopy Registration Form',
                            'C' => 'Photocopy Validated ID',
                            'D' => 'Parent\'s Consent',
                            'E' => 'Medical Certificate / Dental Certificate',
                            'F' => 'Certificate of Good Moral Character',
                            'G' => 'Letter of Intent / Application Letter',
                            'H' => 'Endorsement Letter',
                            'I' => 'Memorandum of Agreement',
                            'J' => 'Daily Time Record (Time Card / Log Book)',
                            'K' => 'Certificate of Clearance (Placement Agency/Office)',
                            'L' => 'Certificate of Completion (Placement Agency/Office)',
                            'M' => 'Performance / Proficient Rating Sheet (Placement Agency/Office)',
                            'N' => 'Pictures During Pre-Service Seminar',
                            'O' => 'Pictures During Office Works',
                            'P' => 'Code of Ethics for CAST Student',
                            'Q' => 'Curriculum Vitae',
                            'R' => 'Internship On-the-Job Training Portfolio Evaluation Form',
                        ];
                    @endphp
                    <div class="space-y-0.5">
                        @foreach($appendicesList as $letter => $desc)
                            <a href="{{ route('appendix', $letter) }}"
                               class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-cyan-500/5 group transition-all">
                                <span class="w-6 h-6 rounded bg-cyan-500/10 flex items-center justify-center text-cyan-400 font-bold text-xs flex-shrink-0 group-hover:bg-cyan-500/20 transition-colors">
                                    {{ $letter }}
                                </span>
                                <span class="text-slate-400 flex-1 group-hover:text-white transition-colors text-xs">
                                    <span class="text-slate-300 font-medium">Appendix {{ $letter }}:</span>
                                    {{ $desc }}
                                </span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-700 group-hover:text-cyan-400 transition-colors flex-shrink-0"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        {{-- Nav --}}
        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('chapter.acknowledgement') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> Acknowledgement
            </a>
            <a href="{{ route('chapter.prayer') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                Student Prayer <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>
@endsection
