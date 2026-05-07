@extends('layouts.app')

@section('title', 'Gallery | David Russel Prado')

@section('styles')
<style>
    .gallery-item {
        transition: all 0.35s ease;
        overflow: hidden;
    }
    .gallery-item:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        z-index: 10;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Lightbox */
    .lightbox {
        backdrop-filter: blur(20px);
    }

    /* Masonry-like grid */
    .gallery-grid {
        columns: 1;
        column-gap: 1rem;
    }
    @media (min-width: 640px) {
        .gallery-grid { columns: 2; }
    }
    @media (min-width: 1024px) {
        .gallery-grid { columns: 3; }
    }

    .gallery-grid-item {
        break-inside: avoid;
        margin-bottom: 1rem;
    }

    .placeholder-img {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 8px;
    }
</style>
@endsection

@section('content')

{{-- Lightbox --}}
<div x-data="gallery()"
     @keydown.escape.window="closeLightbox()"
     class="relative">

    {{-- Lightbox Modal --}}
    <div x-show="lightboxOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lightbox fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4"
         @click.self="closeLightbox()">

        <div class="relative max-w-4xl w-full mx-auto glass-card border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
            {{-- Close --}}
            <button @click="closeLightbox()" class="absolute top-4 right-4 z-10 w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition-all">
                <i class="fa-solid fa-times"></i>
            </button>

            {{-- Image --}}
            <div class="aspect-video bg-navy-800 flex items-center justify-center">
                <template x-if="currentPhoto">
                    <div class="w-full h-full placeholder-img text-slate-500 p-8 text-center">
                        <i class="fa-solid fa-image text-5xl text-brand-500/40 mb-3"></i>
                        <p class="text-sm font-medium text-white" x-text="currentPhoto.title"></p>
                        <p class="text-xs text-slate-500 mt-1" x-text="currentPhoto.caption"></p>
                    </div>
                </template>
            </div>

            {{-- Caption --}}
            <div class="p-6">
                <template x-if="currentPhoto">
                    <div>
                        <h4 class="font-poppins font-semibold text-white text-lg mb-1" x-text="currentPhoto.title"></h4>
                        <p class="text-slate-400 text-sm" x-text="currentPhoto.caption"></p>
                        <div class="flex items-center gap-3 mt-3">
                            <span class="text-xs text-slate-500" x-text="currentPhoto.date"></span>
                            <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-brand-500/10 text-brand-400 border border-brand-500/20" x-text="currentPhoto.category"></span>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Prev / Next --}}
            <button @click="prevPhoto()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white hover:bg-brand-500/30 transition-all">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button @click="nextPhoto()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white hover:bg-brand-500/30 transition-all">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- Page Header --}}
    <div class="py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-pink-600/5 to-transparent pointer-events-none"></div>
        <p class="text-pink-400 text-sm font-semibold uppercase tracking-widest mb-2" data-aos="fade-down">Memories & Moments</p>
        <h1 class="font-poppins font-bold text-4xl sm:text-5xl text-white mb-4" data-aos="fade-up">
            OJT <span class="gradient-text">Gallery</span>
        </h1>
        <p class="text-slate-400 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            A visual diary of my on-the-job training journey — the workplace, team moments, projects, and milestones.
        </p>
    </div>

    <div class="pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            {{-- Category Filters --}}
            <div class="flex flex-wrap justify-center gap-2 mb-10" data-aos="fade-up">
                @php
                    $categories = ['All', 'Workplace', 'Team', 'Projects', 'Events', 'Milestones'];
                @endphp
                @foreach($categories as $cat)
                    <button @click="activeCategory = '{{ $cat }}'"
                            :class="activeCategory === '{{ $cat }}' ? 'bg-gradient-to-r from-brand-600 to-brand-500 text-white border-transparent' : ''"
                            class="px-4 py-2 rounded-full text-sm font-medium text-slate-400 glass-card border border-white/10 hover:border-brand-500/40 hover:text-white transition-all">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            {{-- Stats Bar --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-12" data-aos="fade-up">
                @php
                    $galleryStats = [
                        ['value' => '50+',  'label' => 'Photos',    'icon' => 'fa-images',      'color' => 'text-pink-400'],
                        ['value' => '12',   'label' => 'Weeks',     'icon' => 'fa-calendar',    'color' => 'text-brand-400'],
                        ['value' => '5+',   'label' => 'Events',    'icon' => 'fa-star',        'color' => 'text-yellow-400'],
                        ['value' => '1',    'label' => 'Company',   'icon' => 'fa-building',    'color' => 'text-cyan-400'],
                    ];
                @endphp
                @foreach($galleryStats as $gs)
                    <div class="glass-card border border-white/10 rounded-2xl p-4 text-center">
                        <i class="fa-solid {{ $gs['icon'] }} {{ $gs['color'] }} text-xl mb-2 block"></i>
                        <p class="font-poppins font-bold text-white text-xl">{{ $gs['value'] }}</p>
                        <p class="text-slate-500 text-xs">{{ $gs['label'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Gallery Grid --}}
            @php
                $photos = [
                    ['id' => 1, 'title' => 'First Day Orientation',          'caption' => 'My first day at the company — orientation and workspace setup.',         'category' => 'Milestones', 'date' => 'January 6, 2025',  'icon' => 'fa-door-open',        'color' => 'from-brand-600/40 to-brand-500/20',    'size' => 'tall'],
                    ['id' => 2, 'title' => 'Workstation Setup',              'caption' => 'My workstation where I spent most of my OJT hours.',                    'category' => 'Workplace',  'date' => 'January 7, 2025',  'icon' => 'fa-desktop',          'color' => 'from-cyan-600/40 to-cyan-500/20',      'size' => 'normal'],
                    ['id' => 3, 'title' => 'Team Stand-up Meeting',          'caption' => 'Daily stand-up with the development team.',                              'category' => 'Team',       'date' => 'January 15, 2025', 'icon' => 'fa-users',            'color' => 'from-purple-600/40 to-purple-500/20',  'size' => 'normal'],
                    ['id' => 4, 'title' => 'Coding Session',                 'caption' => 'Deep work session building the Student Information System.',             'category' => 'Projects',   'date' => 'January 22, 2025', 'icon' => 'fa-code',             'color' => 'from-green-600/40 to-green-500/20',    'size' => 'tall'],
                    ['id' => 5, 'title' => 'Database Design Workshop',       'caption' => 'Whiteboard session planning the database schema.',                       'category' => 'Events',     'date' => 'February 3, 2025', 'icon' => 'fa-database',         'color' => 'from-orange-600/40 to-orange-500/20',  'size' => 'normal'],
                    ['id' => 6, 'title' => 'With the IT Department',         'caption' => 'Group photo with the amazing IT department team.',                       'category' => 'Team',       'date' => 'February 14, 2025','icon' => 'fa-people-group',     'color' => 'from-pink-600/40 to-pink-500/20',      'size' => 'normal'],
                    ['id' => 7, 'title' => 'Project Presentation',           'caption' => 'Presenting the Inventory System to stakeholders.',                       'category' => 'Milestones', 'date' => 'February 28, 2025','icon' => 'fa-presentation-screen','color' => 'from-yellow-600/40 to-yellow-500/20', 'size' => 'tall'],
                    ['id' => 8, 'title' => 'Company Tour',                   'caption' => 'Touring the company facilities on orientation week.',                    'category' => 'Workplace',  'date' => 'January 8, 2025',  'icon' => 'fa-building',         'color' => 'from-teal-600/40 to-teal-500/20',      'size' => 'normal'],
                    ['id' => 9, 'title' => 'Code Review Session',            'caption' => 'Getting feedback on my Laravel code from the senior developer.',         'category' => 'Projects',   'date' => 'March 5, 2025',    'icon' => 'fa-magnifying-glass-chart','color' => 'from-violet-600/40 to-violet-500/20','size' => 'normal'],
                    ['id' => 10,'title' => 'OJT Certificate Day',            'caption' => 'The day I received my OJT completion certificate.',                      'category' => 'Milestones', 'date' => 'March 28, 2025',   'icon' => 'fa-certificate',      'color' => 'from-brand-600/40 to-brand-500/20',    'size' => 'tall'],
                    ['id' => 11,'title' => 'Team Lunch Break',               'caption' => 'Lunch with the whole IT team — great bonding moments.',                  'category' => 'Team',       'date' => 'February 21, 2025','icon' => 'fa-utensils',         'color' => 'from-rose-600/40 to-rose-500/20',      'size' => 'normal'],
                    ['id' => 12,'title' => 'Deployment Day',                 'caption' => 'Deploying the Student Information System to the production server.',     'category' => 'Projects',   'date' => 'March 14, 2025',   'icon' => 'fa-rocket',           'color' => 'from-indigo-600/40 to-indigo-500/20',  'size' => 'normal'],
                ];
            @endphp

            <div class="gallery-grid" data-aos="fade-up">
                @foreach($photos as $i => $photo)
                    <div class="gallery-grid-item" x-show="activeCategory === 'All' || activeCategory === '{{ $photo['category'] }}'">
                        <div class="gallery-item relative rounded-2xl overflow-hidden cursor-pointer glass-card border border-white/10 hover:border-brand-500/30"
                             @click="openLightbox({{ $i }})"
                             data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 60 }}">

                            {{-- Photo Placeholder --}}
                            <div class="placeholder-img bg-gradient-to-br {{ $photo['color'] }} border-b border-white/10
                                        {{ $photo['size'] === 'tall' ? 'h-64' : 'h-44' }}">
                                <i class="fa-solid {{ $photo['icon'] }} text-white/40 text-4xl"></i>
                                <p class="text-white/30 text-xs mt-2 px-4 text-center">Add your photo here</p>
                            </div>

                            {{-- Hover Overlay --}}
                            <div class="gallery-overlay absolute inset-0 bg-black/70 flex flex-col items-center justify-center gap-2 p-4 text-center">
                                <i class="fa-solid fa-expand text-white text-xl mb-2"></i>
                                <p class="font-semibold text-white text-sm">{{ $photo['title'] }}</p>
                                <p class="text-white/70 text-xs">{{ $photo['date'] }}</p>
                            </div>

                            {{-- Caption Bar --}}
                            <div class="p-3 bg-navy-800/50">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="text-white text-xs font-medium truncate">{{ $photo['title'] }}</p>
                                    <span class="flex-shrink-0 px-2 py-0.5 rounded-full text-xs bg-brand-500/10 text-brand-400 border border-brand-500/15">
                                        {{ $photo['category'] }}
                                    </span>
                                </div>
                                <p class="text-slate-500 text-xs mt-0.5">{{ $photo['date'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Upload Notice --}}
            <div class="glass-card border border-dashed border-brand-500/30 rounded-2xl p-8 text-center mt-8" data-aos="fade-up">
                <i class="fa-solid fa-cloud-arrow-up text-brand-400/50 text-4xl mb-3"></i>
                <h4 class="font-semibold text-slate-300 text-sm mb-1">Add Your OJT Photos</h4>
                <p class="text-slate-500 text-xs">
                    Replace the placeholder images by adding your actual OJT photos to
                    <code class="text-brand-400">public/images/gallery/</code>
                    and updating the photo data in the gallery view.
                </p>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function gallery() {
        return {
            activeCategory: 'All',
            lightboxOpen: false,
            currentIndex: 0,
            currentPhoto: null,
            photos: @json($photos ?? []),

            openLightbox(index) {
                this.currentIndex = index;
                this.currentPhoto = this.photos[index];
                this.lightboxOpen = true;
                document.body.style.overflow = 'hidden';
            },

            closeLightbox() {
                this.lightboxOpen = false;
                document.body.style.overflow = '';
            },

            prevPhoto() {
                this.currentIndex = (this.currentIndex - 1 + this.photos.length) % this.photos.length;
                this.currentPhoto = this.photos[this.currentIndex];
            },

            nextPhoto() {
                this.currentIndex = (this.currentIndex + 1) % this.photos.length;
                this.currentPhoto = this.photos[this.currentIndex];
            }
        }
    }
</script>
@endsection
