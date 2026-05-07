@extends('layouts.app')

@section('title', 'Projects | David Russel Prado')

@section('styles')
<style>
    .project-card {
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .project-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.4);
    }
    .project-card:hover .project-overlay {
        opacity: 1;
    }
    .project-overlay {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        border-color: transparent;
    }

    .project-image {
        background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(6,182,212,0.1));
        position: relative;
        overflow: hidden;
    }
    .project-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(99,102,241,0.3), rgba(6,182,212,0.2));
    }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-orange-600/5 to-transparent pointer-events-none"></div>
    <p class="text-orange-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">My Work</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        <span class="gradient-text">Projects</span> & Works
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        A showcase of web applications, systems, and tools I've built during my OJT and personal development journey.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8" x-data="{ filter: 'all' }">
    <div class="max-w-6xl mx-auto">

        {{-- Filter Buttons --}}
        <div class="flex flex-wrap justify-center gap-2 mb-12" data-aos="fade-up">
            @php
                $filters = ['all' => 'All Projects', 'ojt' => 'OJT Projects', 'personal' => 'Personal', 'academic' => 'Academic'];
            @endphp
            @foreach($filters as $key => $label)
                <button @click="filter = '{{ $key }}'"
                        :class="filter === '{{ $key }}' ? 'active' : ''"
                        class="filter-btn px-5 py-2 rounded-full text-sm font-medium text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Featured Project --}}
        @php
            $featured = [
                'title'    => 'Student Information System',
                'desc'     => 'A comprehensive web-based Student Information System built with Laravel for managing student records, enrollment, grades, and academic reports. Features role-based access control for admins, faculty, and students.',
                'tech'     => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                'category' => 'ojt',
                'role'     => 'Full-Stack Developer',
                'duration' => '4 Weeks',
                'status'   => 'Completed',
                'color'    => 'from-brand-600 to-brand-500',
            ];
        @endphp
        <div class="glass-card border border-brand-500/30 rounded-3xl overflow-hidden mb-10" data-aos="fade-up"
             x-show="filter === 'all' || filter === 'ojt'">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                {{-- Project Mockup --}}
                <div class="project-image h-64 lg:h-auto flex items-center justify-center p-8 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-600/20 to-cyan-600/10"></div>
                    <div class="relative z-10 w-full max-w-xs">
                        <div class="glass-card border border-white/20 rounded-xl p-4 shadow-2xl">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                <div class="flex-1 h-3 bg-white/10 rounded ml-2"></div>
                            </div>
                            <div class="space-y-2">
                                <div class="h-3 bg-brand-500/30 rounded w-3/4"></div>
                                <div class="h-3 bg-white/10 rounded w-full"></div>
                                <div class="h-3 bg-white/10 rounded w-5/6"></div>
                                <div class="h-8 bg-brand-600/20 rounded mt-3 border border-brand-500/20"></div>
                                <div class="grid grid-cols-3 gap-1.5 mt-2">
                                    <div class="h-6 bg-white/5 rounded border border-white/10"></div>
                                    <div class="h-6 bg-white/5 rounded border border-white/10"></div>
                                    <div class="h-6 bg-white/5 rounded border border-white/10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Content --}}
                <div class="p-8">
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/15 text-brand-400 border border-brand-500/20">Featured</span>
                        <span class="px-3 py-1 rounded-full text-xs bg-green-500/10 text-green-400 border border-green-500/20">{{ $featured['status'] }}</span>
                        <span class="px-3 py-1 rounded-full text-xs bg-white/5 text-slate-400 border border-white/10">OJT Project</span>
                    </div>
                    <h2 class="font-poppins font-bold text-2xl text-white mb-3">{{ $featured['title'] }}</h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-5">{{ $featured['desc'] }}</p>

                    <div class="grid grid-cols-2 gap-3 mb-5">
                        <div class="glass-card border border-white/10 rounded-xl p-3">
                            <p class="text-slate-500 text-xs mb-0.5">Role</p>
                            <p class="text-white text-xs font-semibold">{{ $featured['role'] }}</p>
                        </div>
                        <div class="glass-card border border-white/10 rounded-xl p-3">
                            <p class="text-slate-500 text-xs mb-0.5">Duration</p>
                            <p class="text-white text-xs font-semibold">{{ $featured['duration'] }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($featured['tech'] as $tech)
                            <span class="px-2.5 py-1 rounded-lg text-xs font-medium glass-card border border-white/10 text-slate-300">{{ $tech }}</span>
                        @endforeach
                    </div>

                    <div class="flex gap-3">
                        <a href="#" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow">
                            <i class="fa-solid fa-eye text-xs"></i>
                            Live Demo
                        </a>
                        <a href="#" class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-300 glass-card border border-white/10 hover:border-brand-500/40 transition-all">
                            <i class="fab fa-github text-xs"></i>
                            Source Code
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects Grid --}}
        @php
            $projects = [
                [
                    'title'    => 'Inventory Management System',
                    'desc'     => 'A full-featured inventory system for tracking products, stock levels, purchases, and sales with real-time reporting and PDF exports.',
                    'tech'     => ['Laravel', 'MySQL', 'Tailwind', 'Chart.js'],
                    'category' => 'ojt',
                    'role'     => 'Backend Dev',
                    'status'   => 'Completed',
                    'color'    => 'from-cyan-600 to-cyan-500',
                    'icon'     => 'fa-boxes-stacked',
                    'delay'    => 0,
                ],
                [
                    'title'    => 'Employee Attendance Tracker',
                    'desc'     => 'A web-based attendance monitoring system with QR code check-in, time tracking, leave management, and monthly reports.',
                    'tech'     => ['Laravel', 'PHP', 'MySQL', 'Bootstrap'],
                    'category' => 'ojt',
                    'role'     => 'Full-Stack Dev',
                    'status'   => 'Completed',
                    'color'    => 'from-purple-600 to-purple-500',
                    'icon'     => 'fa-user-clock',
                    'delay'    => 100,
                ],
                [
                    'title'    => 'Library Management System',
                    'desc'     => 'Digitized library operations including book cataloging, borrowing/returning, overdue tracking, and borrower history.',
                    'tech'     => ['Laravel', 'MySQL', 'Tailwind CSS'],
                    'category' => 'academic',
                    'role'     => 'Developer',
                    'status'   => 'Completed',
                    'color'    => 'from-orange-600 to-orange-500',
                    'icon'     => 'fa-book-bookmark',
                    'delay'    => 200,
                ],
                [
                    'title'    => 'Personal Budget Tracker',
                    'desc'     => 'A personal finance app to track income, expenses, savings goals, and visualize spending patterns with interactive charts.',
                    'tech'     => ['Laravel', 'Alpine.js', 'Chart.js', 'Tailwind'],
                    'category' => 'personal',
                    'role'     => 'Full-Stack Dev',
                    'status'   => 'In Progress',
                    'color'    => 'from-green-600 to-green-500',
                    'icon'     => 'fa-wallet',
                    'delay'    => 0,
                ],
                [
                    'title'    => 'Task Management App',
                    'desc'     => 'A Kanban-style project management tool with boards, cards, task assignments, due dates, and team collaboration features.',
                    'tech'     => ['Laravel', 'Livewire', 'MySQL', 'Tailwind'],
                    'category' => 'personal',
                    'role'     => 'Solo Developer',
                    'status'   => 'Completed',
                    'color'    => 'from-pink-600 to-pink-500',
                    'icon'     => 'fa-kanban',
                    'delay'    => 100,
                ],
                [
                    'title'    => 'School Website',
                    'desc'     => 'A responsive informational website for a school featuring news, events, enrollment info, and admin content management.',
                    'tech'     => ['Laravel', 'Bootstrap', 'MySQL'],
                    'category' => 'academic',
                    'role'     => 'Frontend + Backend',
                    'status'   => 'Completed',
                    'color'    => 'from-yellow-600 to-yellow-500',
                    'icon'     => 'fa-school',
                    'delay'    => 200,
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="project-card glass-card border border-white/10 hover:border-brand-500/30 rounded-2xl overflow-hidden"
                     x-show="filter === 'all' || filter === '{{ $project['category'] }}'"
                     data-aos="fade-up" data-aos-delay="{{ $project['delay'] }}">

                    {{-- Project Header --}}
                    <div class="h-36 bg-gradient-to-br {{ $project['color'] }} relative flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 opacity-30">
                            <div class="absolute top-2 right-2 w-20 h-20 rounded-full border border-white/20"></div>
                            <div class="absolute bottom-2 left-2 w-12 h-12 rounded-full border border-white/20"></div>
                        </div>
                        <i class="fa-solid {{ $project['icon'] }} text-white/80 text-5xl"></i>
                        <div class="project-overlay absolute inset-0 bg-black/60 flex items-center justify-center gap-3">
                            <a href="#" class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-white hover:bg-brand-500/30 transition-all">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-white hover:bg-brand-500/30 transition-all">
                                <i class="fab fa-github text-sm"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <h3 class="font-poppins font-semibold text-white text-base leading-snug">{{ $project['title'] }}</h3>
                            <span class="flex-shrink-0 px-2 py-0.5 rounded-full text-xs
                                {{ $project['status'] === 'Completed' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                                {{ $project['status'] }}
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mb-3">{{ $project['role'] }} · {{ ucfirst($project['category']) }}</p>
                        <p class="text-slate-400 text-xs leading-relaxed mb-4 line-clamp-3">{{ $project['desc'] }}</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($project['tech'] as $tech)
                                <span class="px-2 py-0.5 rounded-md text-xs glass-card border border-white/10 text-slate-400">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- GitHub CTA --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <div class="glass-card border border-white/10 rounded-3xl p-10 max-w-2xl mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-5">
                    <i class="fab fa-github text-white text-3xl"></i>
                </div>
                <h3 class="font-poppins font-bold text-2xl text-white mb-3">View More on GitHub</h3>
                <p class="text-slate-400 text-sm mb-6">Check out my GitHub profile for more projects, code samples, and open-source contributions.</p>
                <a href="#" class="inline-flex items-center gap-2 px-8 py-3 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow">
                    <i class="fab fa-github text-sm"></i>
                    Visit My GitHub
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
