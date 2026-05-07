@extends('layouts.app')
@section('title', 'Student Trainee Prayer | Angie')

@section('content')
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-purple-600/5 to-transparent pointer-events-none"></div>
    <p class="text-purple-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Front Matter</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        Student Trainee <span class="gradient-text">Prayer</span>
    </h1>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="glass-card border border-purple-500/20 rounded-3xl p-8 sm:p-12 relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-48 h-48 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-brand-500/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10">
                <div class="flex flex-col items-center gap-3 mb-10 pb-8 border-b border-white/10 text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-600 to-purple-500 flex items-center justify-center shadow-xl">
                        <i class="fa-solid fa-church text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="font-poppins font-bold text-xl text-white">Student Trainee Prayer</h2>
                        <p class="text-slate-500 text-xs mt-1">OJT Portfolio · Angie</p>
                    </div>
                </div>

                <div class="text-center space-y-5 text-slate-300 text-sm leading-loose italic">
                    <p class="text-lg text-white not-italic font-poppins font-semibold">
                        "A Prayer for On-the-Job Trainees"
                    </p>

                    <p>
                        Heavenly Father,<br>
                        As I embark on this journey of learning and growth,<br>
                        I humbly ask for Your divine guidance and wisdom.
                    </p>

                    <p>
                        Grant me the knowledge to understand,<br>
                        the skills to perform,<br>
                        and the character to excel<br>
                        in all tasks entrusted to me.
                    </p>

                    <p>
                        Bless my supervisors and mentors<br>
                        with patience and wisdom to guide me.<br>
                        Teach me to work with integrity,<br>
                        humility, and dedication.
                    </p>

                    <p>
                        Help me to be a good team player,<br>
                        to communicate with clarity and respect,<br>
                        and to contribute positively<br>
                        to every task I am given.
                    </p>

                    <p>
                        May this OJT experience not only<br>
                        build my professional skills,<br>
                        but also shape my character<br>
                        as a responsible and compassionate individual.
                    </p>

                    <p>
                        In all that I do, let Your glory shine.<br>
                        Guide my hands, my mind, and my heart<br>
                        as I grow into the professional<br>
                        You have designed me to be.
                    </p>

                    <p class="text-white not-italic font-medium pt-4">Amen.</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('chapter.toc') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i> Table of Contents
            </a>
            <a href="{{ route('chapter.philosophy') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm text-white animated-gradient btn-glow">
                Personal Philosophy <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>
@endsection
