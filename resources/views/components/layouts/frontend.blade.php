<!DOCTYPE html>
<html lang="bn">
@php
    $website = \App\Models\website::first();
@endphp

<head>
    {{-- <title>{{ $title ?? 'My Website' }}</title> --}}
    {{-- <meta name="theme-color" content="#ffffff"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/' . $website->favicon) }}" type="image/x-icon">
    @if (!trim($__env->yieldPushContent('post-head')))
        <title>{{ $website->title ?? 'My Website' }}</title>
        <meta name="description" content="{{ $website->meta_description ?? 'Default description' }}">
        <meta name="keywords" content="{{ $website->meta_tags ?? 'default, tags' }}">
        <meta property="og:title" content="{{ $website->title ?? 'My Website' }}">
        <meta property="og:description" content="{{ $website->meta_description ?? 'Default description' }}">
        <meta property="og:image" content="{{ asset('storage/' . $website->logo) }}">
        <meta property="og:url" content="{{ url('/') }}">
        <meta name="author" content="{{ $website->title ?? 'My Website' }}">
    @else
        @stack('post-head')
    @endif

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    @fluxAppearance
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Noto Serif Bengali', 'Siyam Rupali', serif;
        }
    </style>
    {{-- @livewireStyles --}}

    @if($website && $website->adsense_publisher_id)
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $website->adsense_publisher_id }}"
                crossorigin="anonymous"></script>
    @endif
</head>

<body class=" bg-white dark:bg-gray-800">

    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId={{ $website->fb_app_id }}&autoLogAppEvents=1"
        nonce="abcd1234">
    </script>

    <!-- Header with logo and social icons -->
        <livewire:frontend.layouts.header />
        <livewire:frontend.layouts.nav />

    {{-- Main Content --}}
        <main class="min-h-screen max-w-7xl mx-auto  py-6">
            {{-- Main content area --}}
            {{ $slot }}
        </main>

    {{-- Footer --}}
        <livewire:frontend.layouts.footer />

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
    @stack('scripts')
    {{-- @livewireStyles --}}
</body>

</html>