<section class="w-full">
    <livewire:ads.display-ads-banner :locationKey="'header_banner'" lazy />
    <header class="bg-white border-b border-gray-200 dark:bg-zinc-900 dark:border-zinc-700">
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
                @if (!empty($facebook_url))
                    <a href="{{ $facebook_url }}" aria-label="Facebook" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-facebook-f" style="color: #1877F3;"></i>
                    </a>
                @endif
                @if (!empty($twitter_url))
                    <a href="{{ $twitter_url }}" aria-label="Twitter" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-twitter" style="color: #1DA1F2;"></i>
                    </a>
                @endif
                @if (!empty($instagram_url))
                    <a href="{{ $instagram_url }}" aria-label="Instagram" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-instagram" style="color: #E4405F;"></i>
                    </a>
                @endif
                @if (!empty($youtube_url))
                    <a href="{{ $youtube_url }}" aria-label="YouTube" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-youtube" style="color: #FF0000;"></i>
                    </a>
                @endif
                @if (!empty($google_news_url))
                    <a href="{{ $google_news_url }}" aria-label="Google News" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-google" style="color: #4285F4;"></i>
                    </a>
                @endif
                @if (!empty($linkedin_url))
                    <a href="{{ $linkedin_url }}" aria-label="LinkedIn" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-linkedin-in" style="color: #0A66C2;"></i>
                    </a>
                @endif
                @if (!empty($reddit_url))
                    <a href="{{ $reddit_url }}" aria-label="Reddit" target="_blank" rel="noopener" class="hover:opacity-80">
                        <i class="fab fa-reddit-alien" style="color: #FF4500;"></i>
                    </a>
                @endif

                <button x-data
                        @click="$store.theme.toggle()"
                        :aria-label="$store.theme.dark ? 'Switch to light mode' : 'Switch to dark mode'"
                        class="ml-2 p-2 rounded-full border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 hover:bg-gray-100 dark:hover:bg-zinc-700 transition" >
                        <svg x-show="$store.theme.dark" class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2" fill="currentColor"/>
                        </svg>
                        <svg x-show="!$store.theme.dark" class="h-5 w-5 text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke="currentColor" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" fill="currentColor"/>
                        </svg>
                </button>
        </div>
        </div>
    </header>
</section>