@extends('layouts.app')

@section('title', 'Contact | David Russel Prado')

@section('styles')
<style>
    .contact-input {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        color: #e2e8f0;
        transition: all 0.2s ease;
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        font-size: 0.875rem;
        outline: none;
    }
    .contact-input:focus {
        border-color: rgba(99,102,241,0.5);
        background: rgba(99,102,241,0.04);
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
    }
    .contact-input::placeholder { color: rgba(148,163,184,0.5); }

    .contact-info-card { transition: all 0.3s ease; }
    .contact-info-card:hover {
        border-color: rgba(99,102,241,0.4) !important;
        transform: translateY(-3px);
    }
</style>
@endsection

@section('content')

{{-- Page Header --}}
<div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-600/5 to-transparent pointer-events-none"></div>
    <p class="text-emerald-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Say Hello</p>
    <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
        Get In <span class="gradient-text">Touch</span>
    </h1>
    <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        Have a project in mind, an opportunity to share, or just want to say hi? I'd love to hear from you.
    </p>
</div>

<div class="pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        {{-- Status Messages --}}
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center gap-3" data-aos="fade-down">
                <i class="fa-solid fa-circle-check text-xl"></i>
                <div>
                    <p class="font-semibold text-sm">Message Sent!</p>
                    <p class="text-xs text-green-400/80">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-start gap-3" data-aos="fade-down">
                <i class="fa-solid fa-circle-xmark text-xl mt-0.5"></i>
                <div>
                    <p class="font-semibold text-sm mb-1">Please fix the following:</p>
                    <ul class="space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li class="text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- Contact Info --}}
            <div class="lg:col-span-2 space-y-5" data-aos="fade-right">

                {{-- Greeting Card --}}
                <div class="glass-card border border-brand-500/20 rounded-3xl p-7">
                    <div class="w-14 h-14 rounded-2xl animated-gradient flex items-center justify-center mb-5 shadow-xl">
                        <i class="fa-solid fa-hand-wave text-white text-2xl"></i>
                    </div>
                    <h2 class="font-poppins font-bold text-xl text-white mb-3">Let's Connect!</h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-5">
                        I'm always open to discussing new opportunities, collaborations, or just having a conversation about technology and development.
                    </p>
                    <div class="flex items-center gap-2 text-sm text-green-400">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        Available for opportunities
                    </div>
                </div>

                {{-- Contact Details --}}
                @php
                    $contactDetails = [
                        ['icon' => 'fa-envelope',      'label' => 'Email',     'value' => 'your.email@gmail.com',       'href' => 'mailto:your.email@gmail.com',       'color' => 'text-brand-400',   'bg' => 'bg-brand-500/10'],
                        ['icon' => 'fa-phone',         'label' => 'Phone',     'value' => '+63 912 345 6789',           'href' => 'tel:+639123456789',                 'color' => 'text-green-400',   'bg' => 'bg-green-500/10'],
                        ['icon' => 'fa-location-dot',  'label' => 'Location',  'value' => 'Occidental Mindoro, PH',     'href' => '#',                                 'color' => 'text-pink-400',    'bg' => 'bg-pink-500/10'],
                        ['icon' => 'fa-graduation-cap','label' => 'School',    'value' => 'OMSC — BSIT',                'href' => '#',                                 'color' => 'text-cyan-400',    'bg' => 'bg-cyan-500/10'],
                    ];
                @endphp
                @foreach($contactDetails as $d)
                    <a href="{{ $d['href'] }}" class="contact-info-card glass-card border border-white/10 rounded-2xl p-4 flex items-center gap-4 block">
                        <div class="w-11 h-11 rounded-xl {{ $d['bg'] }} flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid {{ $d['icon'] }} {{ $d['color'] }} text-base"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs">{{ $d['label'] }}</p>
                            <p class="text-slate-200 text-sm font-medium">{{ $d['value'] }}</p>
                        </div>
                    </a>
                @endforeach

                {{-- Social Links --}}
                <div class="glass-card border border-white/10 rounded-2xl p-5">
                    <p class="text-slate-500 text-xs uppercase tracking-wider font-medium mb-4">Find me on</p>
                    <div class="grid grid-cols-2 gap-3">
                        @php
                            $socials = [
                                ['icon' => 'fab fa-github',    'label' => 'GitHub',    'href' => '#', 'color' => 'text-slate-300 hover:text-white',   'bg' => 'hover:bg-white/10'],
                                ['icon' => 'fab fa-linkedin',  'label' => 'LinkedIn',  'href' => '#', 'color' => 'text-blue-400 hover:text-blue-300',  'bg' => 'hover:bg-blue-500/10'],
                                ['icon' => 'fab fa-facebook',  'label' => 'Facebook',  'href' => '#', 'color' => 'text-blue-500 hover:text-blue-400',  'bg' => 'hover:bg-blue-500/10'],
                                ['icon' => 'fab fa-instagram', 'label' => 'Instagram', 'href' => '#', 'color' => 'text-pink-400 hover:text-pink-300',  'bg' => 'hover:bg-pink-500/10'],
                            ];
                        @endphp
                        @foreach($socials as $social)
                            <a href="{{ $social['href'] }}"
                               class="flex items-center gap-2.5 p-3 rounded-xl glass-card border border-white/10 {{ $social['bg'] }} {{ $social['color'] }} transition-all text-sm font-medium">
                                <i class="{{ $social['icon'] }}"></i>
                                {{ $social['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-3" data-aos="fade-left">
                <div class="glass-card border border-white/10 rounded-3xl p-7 sm:p-10">
                    <h3 class="font-poppins font-bold text-2xl text-white mb-2">Send a Message</h3>
                    <p class="text-slate-400 text-sm mb-8">Fill out the form below and I'll get back to you as soon as possible.</p>

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-5"
                          x-data="{ sending: false }" @submit="sending = true">
                        @csrf

                        {{-- Name + Email --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 mb-2 uppercase tracking-wider">
                                    Full Name <span class="text-red-400">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       placeholder="Your full name"
                                       class="contact-input @error('name') border-red-500/50 @enderror" required>
                                @error('name')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-400 mb-2 uppercase tracking-wider">
                                    Email Address <span class="text-red-400">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       placeholder="your@email.com"
                                       class="contact-input @error('email') border-red-500/50 @enderror" required>
                                @error('email')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Subject --}}
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-2 uppercase tracking-wider">
                                Subject <span class="text-red-400">*</span>
                            </label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                   placeholder="What's this about?"
                                   class="contact-input @error('subject') border-red-500/50 @enderror" required>
                            @error('subject')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Inquiry Type --}}
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-2 uppercase tracking-wider">
                                Inquiry Type
                            </label>
                            <select name="type" class="contact-input">
                                <option value="" class="bg-navy-900">Select inquiry type...</option>
                                <option value="job" class="bg-navy-900" {{ old('type') === 'job' ? 'selected' : '' }}>Job Opportunity</option>
                                <option value="collaboration" class="bg-navy-900" {{ old('type') === 'collaboration' ? 'selected' : '' }}>Project Collaboration</option>
                                <option value="freelance" class="bg-navy-900" {{ old('type') === 'freelance' ? 'selected' : '' }}>Freelance Project</option>
                                <option value="feedback" class="bg-navy-900" {{ old('type') === 'feedback' ? 'selected' : '' }}>Portfolio Feedback</option>
                                <option value="other" class="bg-navy-900" {{ old('type') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        {{-- Message --}}
                        <div>
                            <label class="block text-xs font-medium text-slate-400 mb-2 uppercase tracking-wider">
                                Message <span class="text-red-400">*</span>
                            </label>
                            <textarea name="message" rows="6"
                                      placeholder="Tell me more about your project or opportunity..."
                                      class="contact-input resize-none @error('message') border-red-500/50 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-3 py-4 rounded-xl text-sm font-semibold text-white animated-gradient btn-glow disabled:opacity-50"
                                :disabled="sending">
                            <template x-if="!sending">
                                <span class="flex items-center gap-2">
                                    <i class="fa-solid fa-paper-plane text-sm"></i>
                                    Send Message
                                </span>
                            </template>
                            <template x-if="sending">
                                <span class="flex items-center gap-2">
                                    <svg class="animate-spin w-4 h-4" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                    Sending...
                                </span>
                            </template>
                        </button>

                        <p class="text-center text-slate-600 text-xs">
                            <i class="fa-solid fa-lock text-xs"></i>
                            Your information is kept private and will never be shared.
                        </p>
                    </form>
                </div>

                {{-- Response Time --}}
                <div class="grid grid-cols-3 gap-4 mt-5">
                    @php
                        $promises = [
                            ['icon' => 'fa-clock', 'title' => '24h Response', 'desc' => 'Typical reply time'],
                            ['icon' => 'fa-shield-halved', 'title' => 'Private', 'desc' => 'Data never shared'],
                            ['icon' => 'fa-handshake', 'title' => 'Open to Work', 'desc' => 'Available now'],
                        ];
                    @endphp
                    @foreach($promises as $p)
                        <div class="glass-card border border-white/10 rounded-2xl p-4 text-center">
                            <i class="fa-solid {{ $p['icon'] }} text-brand-400 text-xl mb-2 block"></i>
                            <p class="text-white text-xs font-semibold">{{ $p['title'] }}</p>
                            <p class="text-slate-500 text-xs">{{ $p['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
