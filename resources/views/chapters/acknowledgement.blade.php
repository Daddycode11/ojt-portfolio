@extends('layouts.app')
@section('title', 'Acknowledgement | Angie')

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-brand-600/5 to-transparent pointer-events-none"></div>
    <p class="text-brand-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Front Matter</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        <span class="gradient-text">Acknowledgement</span>
    </h1>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card border border-white/10 rounded-3xl p-8 sm:p-12" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/10">
                <div class="w-12 h-12 rounded-xl animated-gradient flex items-center justify-center shadow-xl">
                    <i class="fa-solid fa-hands-praying text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="font-poppins font-bold text-xl text-white">Acknowledgement</h2>
                    <p class="text-slate-500 text-xs">OJT Portfolio · Angie</p>
                </div>
            </div>

            <div class="prose prose-invert max-w-none space-y-5 text-slate-300 text-sm leading-relaxed">
                <p>
                    First and foremost, I would like to express my heartfelt gratitude to the <strong class="text-white">Almighty God</strong>
                    for the wisdom, strength, and guidance He bestowed upon me throughout this On-the-Job Training experience.
                </p>
                <p>
                    My sincerest appreciation goes to <strong class="text-brand-400">[Your Company Name]</strong> for accepting me
                    as an OJT trainee and for providing me with invaluable real-world experience. I am especially grateful to
                    my supervisors and mentors who patiently guided me and shared their knowledge and expertise.
                </p>
                <p>
                    I would also like to thank <strong class="text-cyan-400">Occidental Mindoro State College (OMSC)</strong> and
                    the faculty of the College of Information Technology for their continuous support, encouragement, and academic
                    preparation that made this OJT experience possible and meaningful.
                </p>
                <p>
                    To my <strong class="text-white">parents and family</strong>, thank you for your unconditional love, financial
                    support, and unwavering belief in my abilities. Your sacrifices and encouragement have been my greatest motivation.
                </p>
                <p>
                    To my <strong class="text-white">friends and classmates</strong>, thank you for the camaraderie, shared laughs,
                    and mutual support throughout this journey. Your company made every challenge more bearable and every success
                    more meaningful.
                </p>
                <p class="text-right italic text-slate-400 mt-8 pt-6 border-t border-white/10">
                    — Angie<br>
                    <span class="text-xs not-italic">BSIT Student · OMSC</span>
                </p>
            </div>
        </div>

        {{-- Navigation --}}
        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> Home
            </a>
            <a href="{{ route('chapter.toc') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                Table of Contents <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>
@endsection
