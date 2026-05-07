@extends('layouts.app')
@section('title', "Appendix {$letter} | Angie")

@php
    $allLetters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R'];
    $descriptions = [
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
    $icons = [
        'A' => 'fa-file-circle-check', 'B' => 'fa-file-alt',       'C' => 'fa-id-card',
        'D' => 'fa-people-roof',        'E' => 'fa-kit-medical',    'F' => 'fa-award',
        'G' => 'fa-envelope-open-text', 'H' => 'fa-paper-plane',    'I' => 'fa-handshake',
        'J' => 'fa-clock',              'K' => 'fa-certificate',    'L' => 'fa-certificate',
        'M' => 'fa-star-half-stroke',   'N' => 'fa-camera',         'O' => 'fa-images',
        'P' => 'fa-scale-balanced',     'Q' => 'fa-user-tie',       'R' => 'fa-clipboard-list',
    ];
    $idx  = array_search($letter, $allLetters);
    $prev = $idx > 0 ? $allLetters[$idx - 1] : null;
    $next = $idx < count($allLetters) - 1 ? $allLetters[$idx + 1] : null;
    $title = $descriptions[$letter] ?? "Appendix {$letter}";
@endphp

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-cyan-600/5 to-transparent pointer-events-none"></div>
    <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Appendices</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-3" data-aos="fade-up">
        Appendix <span class="gradient-text">{{ $letter }}</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">{{ $title }}</p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">

        {{-- Content card --}}
        <div class="glass-card border border-cyan-500/20 rounded-3xl p-8 sm:p-12" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-white/10">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-600 to-cyan-500 flex items-center justify-center shadow-xl flex-shrink-0">
                    <i class="fa-solid {{ $icons[$letter] ?? 'fa-file' }} text-white text-2xl"></i>
                </div>
                <div>
                    <p class="text-cyan-400 text-xs font-semibold uppercase tracking-wider mb-0.5">Appendix {{ $letter }}</p>
                    <h2 class="font-poppins font-bold text-xl text-white leading-snug">{{ $title }}</h2>
                </div>
            </div>

            {{-- Upload placeholder --}}
            <div class="glass-card border border-dashed border-cyan-500/30 rounded-2xl p-10 text-center mb-8">
                <i class="fa-solid fa-cloud-arrow-up text-cyan-400/30 text-5xl mb-4 block"></i>
                <p class="text-slate-300 text-sm font-medium mb-1">Add your document here</p>
                <p class="text-slate-500 text-xs max-w-sm mx-auto">
                    Place scanned files or photos in
                    <code class="text-cyan-400">public/appendices/{{ strtolower($letter) }}/</code>
                    and display them in this view.
                </p>
            </div>

            {{-- All Appendices grid --}}
            <div>
                <p class="text-slate-500 text-xs uppercase tracking-wider mb-4 font-medium">All Appendices</p>
                <div class="grid grid-cols-6 gap-2">
                    @foreach($allLetters as $l)
                        <a href="{{ route('appendix', $l) }}"
                           class="flex flex-col items-center gap-1 py-2.5 rounded-xl text-xs font-bold transition-all
                                  {{ $l === $letter
                                     ? 'animated-gradient text-white shadow-lg'
                                     : 'glass-card border border-white/10 text-slate-400 hover:text-white hover:border-cyan-500/40' }}"
                           title="{{ $descriptions[$l] ?? '' }}">
                            {{ $l }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Prev / Next --}}
        <div class="flex items-center justify-between mt-8">
            @if($prev)
                <a href="{{ route('appendix', $prev) }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-cyan-500/40 hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Appendix {{ $prev }}
                </a>
            @else
                <a href="{{ route('chapter.four') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Chapter IV
                </a>
            @endif

            @if($next)
                <a href="{{ route('appendix', $next) }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                    Appendix {{ $next }} <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @else
                <a href="{{ route('home') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                    Back to Home <i class="fa-solid fa-house text-xs"></i>
                </a>
            @endif
        </div>

    </div>
</div>
@endsection
