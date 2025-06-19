
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