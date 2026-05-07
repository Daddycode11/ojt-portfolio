@extends('layouts.app')
@section('title', 'Personal Philosophy | Angie')

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-yellow-600/5 to-transparent pointer-events-none"></div>
    <p class="text-yellow-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Front Matter</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        Personal <span class="gradient-text">Philosophy</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        The beliefs, values, and principles that guide my professional and personal journey.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-6">

        {{-- Main Philosophy --}}
        <div class="glass-card border border-yellow-500/20 rounded-3xl p-8 sm:p-12" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-600 to-yellow-500 flex items-center justify-center shadow-xl">
                    <i class="fa-solid fa-lightbulb text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="font-poppins font-bold text-xl text-white">Personal Philosophy</h2>
                    <p class="text-slate-500 text-xs">My guiding principles in life and work</p>
                </div>
            </div>

            <blockquote class="border-l-4 border-brand-500 pl-6 mb-8">
                <p class="text-lg text-white font-poppins font-medium italic leading-relaxed">
                    "Continuous learning, genuine service, and purposeful action — these are the cornerstones of a meaningful life and career."
                </p>
                <footer class="text-slate-500 text-sm mt-2">— Angie</footer>
            </blockquote>

            <div class="space-y-5 text-slate-300 text-sm leading-relaxed">
                <p>
                    I believe that <strong class="text-white">technology is a tool for service</strong> — its greatest value lies not in
                    what it can do, but in how it can uplift people's lives. As an IT student and aspiring professional,
                    I am committed to using my skills to create solutions that genuinely matter.
                </p>
                <p>
                    My personal philosophy is rooted in the idea that <strong class="text-brand-400">learning never stops</strong>.
                    The field of technology evolves at an incredible pace, and staying relevant means embracing change with
                    curiosity and enthusiasm rather than resistance. Every challenge is an opportunity in disguise.
                </p>
                <p>
                    I also believe deeply in <strong class="text-cyan-400">integrity and craftsmanship</strong>. Whether writing a
                    line of code or communicating with a team member, I strive to do it with care, precision, and honesty.
                    The quality of one's work is a direct reflection of one's character.
                </p>
            </div>
        </div>

        {{-- Core Values --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4" data-aos="fade-up">
            @php
                $values = [
                    ['icon' => 'fa-infinity',      'title' => 'Growth Mindset',  'desc' => 'I embrace every challenge as a stepping stone to becoming a better version of myself.',         'color' => 'from-brand-600 to-brand-500'],
                    ['icon' => 'fa-heart',         'title' => 'Service First',   'desc' => 'I build technology not for its own sake, but to genuinely help and serve the people around me.', 'color' => 'from-pink-600 to-pink-500'],
                    ['icon' => 'fa-shield-halved', 'title' => 'With Integrity',  'desc' => 'I commit to honesty, transparency, and doing what is right even when no one is watching.',       'color' => 'from-cyan-600 to-cyan-500'],
                ];
            @endphp
            @foreach($values as $v)
                <div class="glass-card border border-white/10 rounded-2xl p-6 text-center hover:-translate-y-1 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $v['color'] }} flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fa-solid {{ $v['icon'] }} text-white text-lg"></i>
                    </div>
                    <h4 class="font-poppins font-semibold text-white text-sm mb-2">{{ $v['title'] }}</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">{{ $v['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('chapter.prayer') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> Student Prayer
            </a>
            <a href="{{ route('chapter.career') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                Career Plan <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>
@endsection
