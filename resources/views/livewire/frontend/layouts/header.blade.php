<header class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-4 md:px-6 py-4 md:py-6 space-y-2 md:space-y-0">
        <div class="flex-1 w-full md:w-auto text-center md:text-left">
            
           
                <p class="text-[15px]">
            {{ \App\Helpers\BanglaDateHelper::formattedLineOne() }}
        </p>
        <p class="text-[15px]">
            {{ \App\Helpers\BanglaDateHelper::formattedLineTwo() }}
        </p>
        
            {{-- <p class="text-[12px]">
                ঢাকা, বৃহস্পতিবার ১০ জুন ২০২১
            </p>
            <p class="text-[12px]">
                ২৬ জ্যৈষ্ঠ ১৪২৮, ১৩ জিলকদ ১৪৪২
            </p>  --}}
        </div>
        <div class="flex justify-center flex-1 w-full md:w-auto order-first md:order-none mb-2 md:mb-0">
            <a href="{{ route('home') }}" wire:navigate>
                <h1 class="font-black text-[24px] md:text-[30px] leading-none"
                    style="font-family: 'Siyam Rupali', serif;">
                    কালের কণ্ঠ
                </h1>
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

    <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="max-lg:hidden dark:hidden" />
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="max-lg:hidden! hidden dark:flex" />

    <flux:navbar class="-mb-px max-lg:hidden">
        @foreach ($menuCategories as $category)
            @if ($category->children->isNotEmpty())
                <flux:dropdown class="max-lg:hidden">
                    <flux:navbar.item icon:trailing="chevron-down">
                        {{ $category->name }}
                    </flux:navbar.item>
                    <flux:navmenu>
                        @foreach ($category->children as $child)
                            <flux:navmenu.item href="#">{{ $child->name }}</flux:navmenu.item>
                        @endforeach
                    </flux:navmenu>
                </flux:dropdown>
            @else
                <flux:navbar.item href="#">{{ $category->name }}</flux:navbar.item>
            @endif
        @endforeach
    </flux:navbar>

    <flux:spacer />

    <flux:navbar class="me-4">
        <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
        <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
        <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
    </flux:navbar>

    <flux:dropdown position="top" align="start">
        <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
        <flux:menu>
            <flux:menu.radio.group>
                <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                <flux:menu.radio>Truly Delta</flux:menu.radio>
            </flux:menu.radio.group>
            <flux:menu.separator />
            <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:header>

</header>