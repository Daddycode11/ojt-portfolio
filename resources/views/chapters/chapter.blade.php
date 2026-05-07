@extends('layouts.app')
@section('title', "{$title} | Angie")

@php
    $romans  = ['I' => 1, 'II' => 2, 'III' => 3, 'IV' => 4];
    $current = $romans[$number];
    $slugMap  = ['I' => 'one', 'II' => 'two', 'III' => 'three', 'IV' => 'four'];
    $prev      = $current > 1 ? array_search($current - 1, $romans) : null;
    $next      = $current < 4 ? array_search($current + 1, $romans) : null;
    $prevRoute = $prev ? "chapter.{$slugMap[$prev]}" : null;
    $nextRoute = $next ? "chapter.{$slugMap[$next]}" : null;
    $colors  = ['I' => 'from-brand-600 to-brand-500', 'II' => 'from-cyan-600 to-cyan-500',   'III' => 'from-purple-600 to-purple-500', 'IV' => 'from-emerald-600 to-emerald-500'];
    $borders = ['I' => 'border-brand-500/20',          'II' => 'border-cyan-500/20',           'III' => 'border-purple-500/20',          'IV' => 'border-emerald-500/20'];
    $accents = ['I' => 'text-brand-400',               'II' => 'text-cyan-400',                'III' => 'text-purple-400',               'IV' => 'text-emerald-400'];
    $sections = [
        'I' => [
            'A. Importance of Internship',
            'B. Objectives of Internship',
            'C. Time and Place of the Internship',
        ],
        'II' => [
            '1. Nature of the Agency',
            '2. Mission / Vision / Goal Statement',
            '3. History / Background of the Agency with Pictures',
            '4. Organizational Structure',
        ],
        'III' => [
            '1. Weekly Accomplishment Report',
            '2. Daily Time Record',
            '3. Internship Progress Report',
            '4. Internship Analysis Report',
        ],
        'IV' => [
            '1. Student Internship Evaluation Form',
        ],
    ];
@endphp

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-purple-600/5 to-transparent pointer-events-none"></div>
    <p class="text-purple-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">OJT Portfolio</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-3" data-aos="fade-up">
        Chapter <span class="gradient-text">{{ $number }}</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="100">{{ $subtitle }}</p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">

        {{-- Chapter header card --}}
        <div class="glass-card border {{ $borders[$number] }} rounded-3xl p-8 sm:p-12 mb-8" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-white/10">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $colors[$number] }} flex items-center justify-center shadow-xl flex-shrink-0">
                    <span class="font-poppins font-black text-white text-xl">{{ $number }}</span>
                </div>
                <div>
                    <h2 class="font-poppins font-bold text-2xl text-white">{{ $title }}</h2>
                    <p class="{{ $accents[$number] }} text-sm font-medium mt-0.5">{{ $subtitle }}</p>
                </div>
            </div>

            {{-- Section list --}}
            <div class="space-y-2 mb-8">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-3">Contents of this Chapter</p>
                @foreach($sections[$number] as $section)
                    <div class="flex items-center gap-3 px-4 py-3 rounded-xl glass-card border border-white/8 hover:border-{{ explode('-', $colors[$number])[1] }}-500/30 transition-all group">
                        <div class="w-2 h-2 rounded-full bg-gradient-to-br {{ $colors[$number] }} flex-shrink-0"></div>
                        <span class="text-slate-300 text-sm group-hover:text-white transition-colors">{{ $section }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Add content placeholder --}}
            <div class="glass-card border border-dashed border-white/15 rounded-2xl p-6 text-center">
                <i class="fa-solid fa-pen-to-square {{ $accents[$number] }} opacity-30 text-3xl mb-2 block"></i>
                <p class="text-slate-500 text-xs">
                    Add your actual content to
                    <code class="{{ $accents[$number] }}">resources/views/chapters/chapter.blade.php</code>
                    or create a dedicated view per chapter.
                </p>
            </div>
        </div>

        {{-- Chapter navigation --}}
        <div class="glass-card border border-white/10 rounded-2xl p-4 mb-8" data-aos="fade-up">
            <p class="text-slate-500 text-xs uppercase tracking-wider mb-3 px-1">All Chapters</p>
            <div class="grid grid-cols-4 gap-2">
                @foreach(['I'=>'one','II'=>'two','III'=>'three','IV'=>'four'] as $roman => $slug)
                    <a href="{{ route('chapter.' . $slug) }}"
                       class="flex flex-col items-center gap-1.5 py-3 rounded-xl transition-all text-center
                              {{ $roman === $number
                                 ? 'bg-gradient-to-br ' . $colors[$number] . ' text-white shadow-lg'
                                 : 'glass-card border border-white/10 text-slate-400 hover:text-white hover:border-purple-500/30' }}">
                        <span class="font-poppins font-bold text-sm">{{ $roman }}</span>
                        <span class="text-xs opacity-70">Chapter {{ $roman }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Prev / Next --}}
        <div class="flex items-center justify-between" data-aos="fade-up">
            @if($prevRoute)
                <a href="{{ route($prevRoute) }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-purple-500/40 hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Chapter {{ $prev }}
                </a>
            @else
                <a href="{{ route('chapter.career') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Career Plan
                </a>
            @endif

            @if($nextRoute)
                <a href="{{ route($nextRoute) }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                    Chapter {{ $next }} <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @else
                <a href="{{ route('appendix', 'A') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                    Appendix A <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @endif
        </div>

    </div>
</div>
@endsection
