<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
@php
    $website = \App\Models\website::first();
@endphp

<head>
    <script>
        (function() {
            try {
                function applyTheme() {
                    var currentTheme = localStorage.getItem('theme');
                    if (!currentTheme) {
                        currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                    }
        
                    const hasDarkClass = document.documentElement.classList.contains('dark');
        
                    if (currentTheme === 'dark' && !hasDarkClass) {
                        document.documentElement.classList.add('dark');
                    } else if (currentTheme !== 'dark' && hasDarkClass) {
                        document.documentElement.classList.remove('dark');
                    }
                }
        
                // Initial
                applyTheme();
        
                // Watch for className tampering
                new MutationObserver(function() {
                    applyTheme();
                }).observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        
                // Watch for localStorage changes (from other tabs)
                window.addEventListener('storage', function(e) {
                    if (e.key === 'theme') {
                        applyTheme();
                    }
                });
            } catch (e) {}
        })();
    </script>
        
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $favicon = $website && $website->favicon ? $website->favicon : 'favicon.ico';
        $title = $website && $website->title ? $website->title : 'My Website';
        $description = $website && $website->meta_description ? $website->meta_description : 'Default description';
        $keywords = $website && $website->meta_tags ? $website->meta_tags : 'default, tags';
        // $logo = $website && $website->logo ? $website->logo : 'default-logo.png';
    @endphp

        <link rel="icon" href="{{ asset('storage/' . $favicon) }}" type="image/x-icon">

        @if (!trim($__env->yieldPushContent('post-head')))
            <title>{{ $title }}</title>
            <meta name="description" content="{{ $description }}">
            <meta name="keywords" content="{{ $keywords }}">
            <meta property="og:title" content="{{ $title }}">
            <meta property="og:description" content="{{ $description }}">
@if ($website && $website->logo)
<meta property="og:image" content="{{ asset('storage/' . $website->logo) }}">
@endif
            <meta property="og:url" content="{{ url('/') }}">
            <meta name="author" content="{{ $title }}">
        @else
            @stack('post-head')
        @endif


    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    @fluxAppearance
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom styles */
        body {
            font-family: 'Hind Siliguri', 'Inter', sans-serif;
        }
    </style>
    @stack('styles')
    {{-- @livewireStyles --}}

    @if($website && $website->adsense_publisher_id)
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $website->adsense_publisher_id }}"
                crossorigin="anonymous"></script>
    @endif
</head>

<body class=" bg-white dark:bg-zinc-900">
    <div>
            <!-- Facebook SDK -->
    <div id="fb-root"></div>
    @php
        $fbAppId = $website && $website->fb_app_id ? $website->fb_app_id : '12345678';
    @endphp
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId={{ $fbAppId }}&autoLogAppEvents=1"
        nonce="abcd1234">
    </script>

        <livewire:frontend.layouts.header />
        <livewire:frontend.layouts.nav />

        <main class="min-h-screen max-w-7xl mx-auto py-4">
            {{ $slot }}
        </main>

        <livewire:frontend.layouts.footer />
    </div>
    

    <!-- Footer Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        @fluxScripts
    <script>
        document.addEventListener('DOMContentLoaded', () => {
                if (window.initFlowbite) {
                    window.initFlowbite();
                }
            });
        
            document.addEventListener('livewire:navigated', () => {
                if (window.initFlowbite) {
                    window.initFlowbite();
                }
            });
            
            $(document).ready(function(){
                $('.home-autoplay-carousel').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                    }
                ]
            });
        
        });
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                dark: false,
                toggle() {
                    this.dark = !this.dark;
                    this.apply();
                },
                apply() {
                    if (this.dark) {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                },
                init() {
                    this.dark = localStorage.getItem('theme') === 'dark' ||
                        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
                    this.apply();
                }
            });

            Alpine.store('theme').init();
        });

        document.addEventListener('livewire:navigated', () => {
            if (Alpine && Alpine.store) {
                Alpine.store('theme').init();
            }
        });

        document.addEventListener('livewire:load', () => {
            Alpine.store('theme').init();
        });

        
    </script>



    @stack('scripts')
    {{-- @livewireStyles --}}
</body>

</html>