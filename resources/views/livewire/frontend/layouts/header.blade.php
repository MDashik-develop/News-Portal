<section class="w-full">
    <livewire:ads.display-ads-banner :locationKey="'header_banner'" lazy />
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 py-2 md:py-6 space-y-2 md:space-y-0">
            <div class="flex-1 w-full md:w-auto text-center md:text-left">
            <p class="text-[15px]">
                    {{ \App\Helpers\BanglaDateHelper::formattedLineOne() }}
                </p>
                <p class="text-[15px]">
                    {{ \App\Helpers\BanglaDateHelper::formattedLineTwo() }}
                </p>
            </div>
            <div class="flex justify-center flex-1 w-full md:w-auto order-first md:order-none mb-2 md:mb-0 h-16 md:h-20 max-h-20">
                <a href="{{ route('home') }}"
                wire:navigate 
                class="flex items-center justify-center max-h-full">
                    <img src="{{ asset('storage/' . $logo) }}" class="h-full w-auto" alt="{{ $logo }}"">
                </a>
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
</section>