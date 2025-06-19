<!DOCTYPE html>
<html lang="bn">
@php
$website = \App\Models\website::first();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ $title ?? 'My Website' }}</title> --}}
    <title>{{ $website->title ?? 'My Website' }}</title>
    <meta name="description" content="{{ $website->meta_description ?? 'Default description' }}">
    <meta name="keywords" content="{{ $website->tagsString ?? 'default, tags' }}">
    <meta name="author" content="{{ $website->title ?? 'My Website' }}">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="{{ $website->title ?? 'My Website' }}">
    <meta property="og:description" content="{{ $website->meta_description ?? 'Default description' }}">
    <meta property="og:image" content="{{ asset('storage/' . $website->logo) }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    {{--
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $website->title ?? 'My Website' }}">
    <meta name="twitter:description" content="{{ $website->meta_description ?? 'Default description' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:site" content="@your_twitter_handle">
    <meta name="twitter:creator" content="@your_twitter_handle">
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link rel="icon" href="{{ asset('storage/' . $website->favicon) }}" type="image/x-icon">


    <link href="https://fonts.googleapis.com/css2?family=Siyam+Rupali&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            /* font-family: 'Siyam Rupali', serif; */
            font-family: 'Noto Serif Bengali', 'Siyam Rupali', serif;
        }
    </style>
    {{-- @livewireStyles --}}
</head>

<body class=" bg-white dark:bg-gray-800">

    <!-- Facebook SDK -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId={{ $website->fb_app_id }}&autoLogAppEvents=1"
        nonce="abcd1234">
    </script>

    <!-- Header with logo and social icons -->
        @livewire('frontend.layouts.header')
        @livewire('frontend.layouts.nav')

    {{-- <livewire:navigate /> --}}

    {{-- Main Content --}}
        <main class="min-h-screen max-w-7xl mx-auto  py-6">
            {{-- Main content area --}}
            {{ $slot }}
        </main>

    {{-- Footer --}}
        @livewire('frontend.layouts.footer')

    <!-- Footer Scripts -->
        <!-- Load only the essential Font Awesome JS bundle for better performance -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- fowbite JS -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <!-- Slick JS -->
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
    </script>
    @stack('scripts')
    {{-- @livewireStyles --}}
</body>

</html>