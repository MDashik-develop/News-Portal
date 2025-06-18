<!DOCTYPE html>
<html lang="en">
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
    {{-- <meta name="twitter:card" content="summary_large_image">
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Siyam Rupali', serif;
        }
    </style>
</head>

<body class=" bg-white dark:bg-gray-800">

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId={{ $website->fb_app_id }}&autoLogAppEvents=1"
    nonce="abcd1234">
</script>


    {{--
    <livewire:navigate /> --}}

    <!-- Header with logo and social icons -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 md:px-6 py-4 md:py-6 select-none space-y-2 md:space-y-0">
            <div class="flex-1 w-full md:w-auto text-center md:text-left">
                <p class="text-[12px]">
                    ঢাকা, বৃহস্পতিবার ১০ জুন ২০২১
                </p>
                <p class="text-[12px]">
                    ২৬ জ্যৈষ্ঠ ১৪২৮, ১৩ জিলকদ ১৪৪২
                </p>
            </div>
            <div class="flex justify-center flex-1 w-full md:w-auto order-first md:order-none mb-2 md:mb-0">
                <h1 class="font-black text-[24px] md:text-[30px] leading-none"
                    style="font-family: 'Siyam Rupali', serif;">
                    কালের কণ্ঠ
                </h1>
            </div>
            <div
                class="flex items-center space-x-2 text-[12px] text-[#b30000] font-normal flex-1 w-full md:w-auto justify-center md:justify-end">
                <span class="hidden sm:inline">ই-পেপার</span>
                <a aria-label="Facebook" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a aria-label="Twitter" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a aria-label="Instagram" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a aria-label="YouTube" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-youtube"></i>
                </a>
                <a aria-label="Google Plus" class="text-[#b30000] hover:text-[#800000] hidden sm:inline" href="#">
                    <i class="fab fa-google"></i>
                </a>
                <a aria-label="Search" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fas fa-search"></i>
                </a>
                <a aria-label="Calendar" class="text-[#b30000] hover:text-[#800000] hidden sm:inline" href="#">
                    <i class="far fa-calendar-alt"></i>
                </a>
                <a aria-label="Language" class="text-[#b30000] hover:text-[#800000] hidden sm:inline" href="#">
                    <i class="fas fa-language"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- Responsive Navigation bar -->
    <nav class="bg-[#f8f9fa] border-b border-gray-200 select-none sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-2 md:px-0">
            <div class="flex justify-between items-center">
                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden px-3 py-2 focus:outline-none">
                    <i class="fas fa-bars text-[18px]"></i>
                </button>
                <ul class="hidden md:flex flex-wrap text-[14px] font-normal text-black w-full">
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        সর্বশেষ
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                        বাংলাদেশ
                        <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        বিশ্ব
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        খেলা
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        বিনোদন
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        বাণিজ্য
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                        ইসলামি জীবন
                        <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        জীবনযাপন
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                        বঙ্গবন্ধুর শুভসংঘ
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-[#00bcd4] text-[#00bcd4]">
                        ভিডিও
                    </li>
                    <li
                        class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center text-[#2f7a2f]">
                        পত্রিকা
                        <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                    </li>
                    <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                        ফিচার
                        <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                    </li>
                    <li class="px-3 py-2 cursor-pointer hover:bg-gray-100 md:hidden">
                        <i class="fas fa-bars text-[18px]"></i>
                    </li>
                </ul>
            </div>
            <!-- Mobile menu -->
            <ul id="mobile-menu"
                class="md:hidden hidden flex-col bg-white shadow-lg rounded-b-lg mt-2 text-[14px] font-normal text-black">
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">সর্বশেষ</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                    বাংলাদেশ
                    <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                </li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">বিশ্ব</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">খেলা</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">বিনোদন</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">বাণিজ্য</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                    ইসলামি জীবন
                    <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                </li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">জীবনযাপন</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100">বঙ্গবন্ধুর শুভসংঘ</li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-[#00bcd4] text-[#00bcd4]">ভিডিও
                </li>
                <li
                    class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100 flex items-center text-[#2f7a2f]">
                    পত্রিকা
                    <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                </li>
                <li class="border-b border-gray-200 px-4 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                    ফিচার
                    <i class="fas fa-caret-down ml-1 text-[10px]"></i>
                </li>
            </ul>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('mobile-menu-btn');
                    const menu = document.getElementById('mobile-menu');
                    btn && btn.addEventListener('click', function () {
                        menu.classList.toggle('hidden');
                    });
                });
        </script>
    </nav>

    {{-- Main Content --}}
    <main class="min-h-screen max-w-7xl mx-auto  py-6">
        {{-- Main content area --}}
        {{ $slot }}
    </main>

    {{-- Footer --}}
    {{-- @include('layouts.partials.footer') --}}
    <footer class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 pt-12 pb-10 text-gray-700 text-sm select-none">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-y-10 gap-x-8 border-b border-gray-300 pb-10">
            <div>
                <h3 class="font-bold text-base mb-4 border-b-2 border-[#f97316] inline-block pb-1">
                    মোবাইল অ্যাপস ডাউনলোড করুন
                </h3>
                <div class="flex space-x-4 mt-3">
                    <a aria-label="Google Play Store" href="#">
                        <img alt="Google Play Store button with Google Play logo and text GET IT ON Google Play"
                            class="w-[120px] h-[44px] object-contain rounded-md shadow-sm hover:shadow-md transition-shadow"
                            height="44"
                            src="https://storage.googleapis.com/a1aa/image/a7af65df-88e4-4e12-9f00-f4d18f07acf9.jpg"
                            width="120" />
                    </a>
                    <a aria-label="Apple App Store" href="#">
                        <img alt="Apple App Store button with Apple logo and text GET IT ON App Store"
                            class="w-[120px] h-[44px] object-contain rounded-md shadow-sm hover:shadow-md transition-shadow"
                            height="44"
                            src="https://storage.googleapis.com/a1aa/image/9b2f53fb-eac8-4585-1c3e-43349e05c699.jpg"
                            width="120" />
                    </a>
                </div>
                <h4 class="font-bold mt-10 mb-3 text-gray-900">অনুসরণ করুন</h4>
                <div class="flex space-x-5 text-xl">
                    <a aria-label="Facebook" class="text-[#3b5998] hover:text-[#2d4373] transition-colors" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a aria-label="Twitter" class="text-[#1da1f2] hover:text-[#0d95e8] transition-colors" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a aria-label="Instagram" class="text-[#e4405f] hover:text-[#d81e5b] transition-colors" href="#"><i
                            class="fab fa-instagram"></i></a>
                    <a aria-label="Blogger" class="text-[#f57d00] hover:text-[#c75b00] transition-colors" href="#"><i
                            class="fab fa-blogger-b"></i></a>
                    <a aria-label="YouTube" class="text-[#ff0000] hover:text-[#cc0000] transition-colors" href="#"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h3 class="font-bold text-base mb-4 border-b-2 border-[#f97316] inline-block pb-1">
                    আজকের পত্রিকা
                </h3>
                <ul class="space-y-2 text-gray-600">
                    <li>
                        <a class="hover:text-gray-900 transition-colors" href="#">প্রথম পাতা</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-900 transition-colors" href="#">খেলা</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-900 transition-colors" href="#">ভূতপূর্ব</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3
                    class="invisible md:visible md:static font-bold text-base mb-4 border-b-2 border-[#f97316] inline-block pb-1">
                    &nbsp;
                </h3>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">শেষের পাতা</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">খবর</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">দেশে দেশে</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-base mb-4 border-b-2 border-[#f97316] inline-block pb-1">
                    অনলাইন
                </h3>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">জাতীয়</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">বিশ্ব</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-700 transition-colors" href="#">বিনোদন</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-base mb-4 border-b-2 border-[#f97316] inline-block pb-1">
                    বিজ্ঞাপন
                </h3>
                <p class="text-gray-400 cursor-default select-text">
                    মূল্য তালিকা (প্রিন্ট ভার্সন)
                </p>
            </div>
        </div>

        <div
            class="mt-12 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 space-y-4 md:space-y-0">
            <p class="font-semibold select-text">সম্পাদক : হাসান হাকিম</p>
            <nav class="flex space-x-8 text-center">
                <a class="hover:text-gray-900 transition-colors" href="#">আমাদের সম্পর্কে</a>
                <a class="hover:text-gray-900 transition-colors" href="#">শর্তাবলী</a>
                <a class="hover:text-gray-900 transition-colors" href="#">গোপনীয়তা নীতি</a>
                <a class="hover:text-gray-900 transition-colors" href="#">যোগাযোগ করুন</a>
            </nav>
        </div>

        <p class="mt-8 text-center text-gray-400 text-xs select-text">
            স্বত্ব © ২০২৫ কালের কণ্ঠ
        </p>
    </footer>

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
</body>

</html>