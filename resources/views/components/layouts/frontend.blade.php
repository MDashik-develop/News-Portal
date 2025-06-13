<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Website' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Siyam+Rupali&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
     body {
      font-family: 'Siyam Rupali', serif;
    }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
    {{-- Header with Navbar --}}

    <!-- Header with logo and social icons -->
    <header class=" bg-white  border-b border-gray-200">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-6 select-none">     
            <div class="flex-1 ">
                <p class="text-[12px]">
                    ঢাকা, বৃহস্পতিবার ১০ জুন ২০২১
                </p>
                <p class="text-[12px]">
                    ২৬ জ্যৈষ্ঠ ১৪২৮, ১৩ জিলকদ ১৪৪২
                </p>
            </div>
            <div class="flex justify-center flex-1">
                <h1 class="font-black text-[30px] leading-none" style="font-family: 'Siyam Rupali', serif;">
                    কালের কণ্ঠ
                </h1>
            </div>
            <div class="flex items-center space-x-2 text-[12px] text-[#b30000] font-normal flex-1 justify-end">
                <span>
                    ই-পেপার
                </span>
                <a aria-label="Facebook" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-facebook-f">
                    </i>
                </a>
                <a aria-label="Twitter" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-twitter">
                    </i>
                </a>
                <a aria-label="Instagram" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-instagram">
                    </i>
                </a>
                <a aria-label="YouTube" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-youtube">
                    </i>
                </a>
                <a aria-label="Google Plus" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fab fa-google">
                    </i>
                </a>
                <a aria-label="Search" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fas fa-search">
                    </i>
                </a>
                <a aria-label="Calendar" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="far fa-calendar-alt">
                    </i>
                </a>
                <a aria-label="Language" class="text-[#b30000] hover:text-[#800000]" href="#">
                    <i class="fas fa-language">
                    </i>
                </a>
            </div>
        </div>
    </header>
    <!-- Navigation bar -->
    <nav class="bg-[#f8f9fa] border-b border-gray-200 select-none">
        <div class="max-w-7xl mx-auto">
            <ul class="flex flex-wrap text-[14px] font-normal text-black">
                <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100">
                    সর্বশেষ
                </li>
                <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                    বাংলাদেশ
                    <i class="fas fa-caret-down ml-1 text-[10px]">
                    </i>
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
                    <i class="fas fa-caret-down ml-1 text-[10px]">
                    </i>
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
                    <i class="fas fa-caret-down ml-1 text-[10px]">
                    </i>
                </li>
                <li class="border-r border-gray-300 px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                    ফিচার
                    <i class="fas fa-caret-down ml-1 text-[10px]">
                    </i>
                </li>
                <li class="px-3 py-2 cursor-pointer hover:bg-gray-100">
                    <i class="fas fa-bars text-[18px]">
                    </i>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Main Content --}}
        <main class="min-h-screen max-w-7xl mx-auto  py-6">
        {{-- Main content area --}}
        {{ $slot }}
    </main>

    {{-- Footer --}}
    {{-- @include('layouts.partials.footer') --}}
    <footer>
        <div class="bg-gray-800 text-white py-8">
            <div class="max-w-5xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- About Section -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">About Us</h3>
                        <p class="text-gray-300">Your trusted source for the latest news and updates from Bangladesh and around the world.</p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Latest News</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Sports</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Entertainment</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>Email: info@newspaper.com</li>
                            <li>Phone: +880 1234567890</li>
                            <li>Address: Dhaka, Bangladesh</li>
                        </ul>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-300">
                    <p>&copy; {{ date('Y') }} Your Newspaper Name. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>