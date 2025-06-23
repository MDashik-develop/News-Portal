<section>
    {{-- top sectio --}}
    <div class="flex gap-2 p-2 mb-2 sm:flex-row flex-col">
        <div class="md:w-[70%]">
            <div class="flex lg:flex-row flex-col gap-2 mb-10" lazy>
                {{-- @foreach ( $featuredPosts as $featuredPost )
                <a href="{{ route('post.view', ['slug' => $featuredPost->slug]) }}" wire:navigate
                    class="flex flex-col-reverse sm:flex-row gap-2 lg:w-8/12 mb-1.5 sm:">
                    <div class="w-full md:w-2/5 flex flex-col justify-between gap-2">
                        <h2 class="line-clamp-3 text-2xl text-blue-500">
                            {{ $featuredPost->title }}
                        </h2>
                        <h1 class="line-clamp-3 text-2xl">
                            {{ $featuredPost->summary }}
                        </h1>
                        <p class="line-clamp-3 text-1xl">
                            {{ $featuredPost->content }}
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('storage/' . $featuredPost->featured_image) }}"
                            alt="{{ $featuredPost->title }}" class="w-[600px] max-h-[273px]">
                    </div>
                </a>
                @endforeach --}}
                {{-- s1 --}}
                <livewire:frontend.sections.featured-post />
                <livewire:frontend.sections.s1 />
            </div>

            <livewire:frontend.sections.s2 />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                {{-- s3 --}}
                <a href="{{ route('post.view', ['slug' => 1]) }}" wire:navigate class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        laasN oteworthy technology acquisitions 2021</h5>
                </a>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
                <div href="#" class="flex justify-between gap-2 ">
                    <img src="https://placehold.co/300x200" alt="" class="mb-2 max-w-30">
                    <h5 class="w-50 mb-2 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021</h5>
                </div>
            </div>
        </div>
        <aside class="md:w-[30%]">
            <div class="ads-aside" class="w-full h-auto">
                <livewire:ads.display-ad :locationKey="'home_sidebar'" lazy />
            </div>

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-[200px] overflow-hidden rounded-lg">
                    <!-- Item 1 -->
                    <a href="{{ route('post.view', ['slug' => 1]) }}" wire:navigate
                        class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://placehold.co/300x200"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://placehold.co/300x200"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://placehold.co/300x200"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://placehold.co/300x200"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://placehold.co/300x200"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-between text-gray-500 dark:text-gray-400"
                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-flex items-center justify-center p-4 border-b-2 border-blue-600 rounded-t-lg active hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"
                            id="latestPosts-tab" data-tabs-target="#latestPosts" type="button" role="tab"
                            aria-controls="latestPosts" aria-selected="true">
                            সর্বশেষ
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-500 dark:hover:text-blue-500 group"
                            id="todayBest-tab" data-tabs-target="#todayBest" type="button" role="tab"
                            aria-controls="todayBest" aria-selected="false">
                            দিনের সেরা
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-500 dark:hover:text-blue-500 group"
                            id="weekBest-tab" data-tabs-target="#weekBest" type="button" role="tab"
                            aria-controls="weekBest" aria-selected="false">
                            সপ্তাহের সেরা
                        </button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content" class="overflow-y-auto">
                <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800" id="latestPosts" role="tabpanel"
                    aria-labelledby="latestPosts-tab">
                    <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                        @if ($letetstPosts->isNotEmpty())
                            @foreach ($letetstPosts as $letetstPost)
                                <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                    <i class="fas fa-play text-[#d00] mt-1"></i>
                                    <a href="{{ route('post.view', ['slug' => $letetstPost->slug]) }}" wire:navigate>
                                        <p class="line-clamp-2 max-h-min mb-1">
                                            {{ $letetstPost->title }}
                                        </p>
                                        <p class="text-[11px]">
                                            <i class="far fa-clock text-gray-500"></i>
                                            {{ $this->getBengaliTimeAgo($letetstPost->published_at) }} |
                                            <span class="text-[#d00]">{{ $letetstPost->category?->name ?? 'Uncategorized' }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="text-center text-gray-500">কোনো পোস্ট নেই</li>
                        @endif

                    </ul>
                </div>
                <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800" id="todayBest" role="tabpanel"
                    aria-labelledby="todayBest-tab">
                    <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                        @if ($todayBestPosts->isNotEmpty())
                            @foreach ($todayBestPosts as $todayBestPost)
                                <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                    <i class="fas fa-play text-[#d00] mt-1"></i>
                                    <a href="{{ route('post.view', ['slug' => $todayBestPost->slug]) }}" wire:navigate>
                                        <p class="line-clamp-2 max-h-min mb-1">
                                            {{ $todayBestPost->title }}
                                        </p>
                                        <p class="text-[11px]">
                                            <i class="far fa-clock text-gray-500"></i>
                                            {{ $this->getBengaliTimeAgo($todayBestPost->published_at) }} | 
                                            <span class="text-[#d00]">
                                                {{ $todayBestPost->category?->name ?? 'Uncategorized' }}
                                            </span>
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="text-center text-gray-500">কোনো পোস্ট নেই</li>
                        @endif

                    </ul>
                </div>
                <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800" id="weekBest" role="tabpanel"
                    aria-labelledby="weekBest-tab">
                    <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                        @if ($weekBestPosts->isEmpty()) 
                            @foreach ($weekBestPosts as $weekBestPost)
                                <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                    <i class="fas fa-play text-[#d00] mt-1"></i>
                                    <a href="{{ route('post.view', ['slug' => $weekBestPost->slug]) }}" wire:navigate>
                                        <p class="line-clamp-2 max-h-min mb-1">
                                            {{ $weekBestPost->title }}
                                        </p>
                                        <p class="text-[11px]">
                                            <i class="far fa-clock text-gray-500"></i>
                                            {{ $this->getBengaliTimeAgo($weekBestPost->published_at) }} | <span
                                                class="text-[#d00]">{{ $weekBestPost->category?->name ?? 'Uncategorized' }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="text-center text-gray-500">কোনো পোস্ট নেই</li>
                        @endif
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <livewire:frontend.sections.home-carousel />
    <livewire:frontend.sections.s4 lazy />

    <div>
        <div class="stock-marquee-container">
            <div class="marquee-content" id="marquee-content">
            </div>
        </div>
    </div>

    {{-- sports --}}
    <div class="my-5">
        <div class="inline-flex items-center justify-center w-full">
            <hr class="w-full h-[4px] my-8 bg-gray-200 border-0 dark:bg-gray-700 rounded-lg">
            <span
                class="absolute px-3 font-semibold text-2xl text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">খেলা</span>
        </div>
        <div class="flex flex-col lg:flex-row gap-6 my-4">
            <!-- Left column -->
            <div class="flex flex-col space-y-4 w-full lg:w-1/4">
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
            </div>
            <!-- Center column -->
            <div class="w-full lg:w-1/2">
                <img src="https://placehold.co/600x400" class="h-[85%] object-cover"
                    alt="গোল উৎসবে ক্লাব বিশ্বকাপ শুরু পিএসজির" />
                <h3 class="mt-3 text-base font-semibold leading-tight text-justify">
                    গোল উৎসবে ক্লাব বিশ্বকাপ শুরু পিএসজির
                </h3>
                <p class="mt-1 text-xs text-gray-500 text-justify h-[15%]">
                    ক্লাব বিশ্বকাপে দুর্দান্ত শুরু করল প্যারিস সেন্ট-জার্মেই (পিএসজি)। রবিবার ক্যালিফোর্নিয়ার ঐতিহাসিক
                    র...
                </p>
            </div>

            {{-- <a href="#"
                class="block bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <img src="https://placehold.co/600x400" alt="গোল উৎসবে ক্লাব বিশ্বকাপ শুরু পিএসজির">
                <h3 class="mt-3 text-base font-semibold leading-tight text-justify">
                    গোল উৎসবে ক্লাব বিশ্বকাপ শুরু পিএসজির
                </h3>
                <p class="mt-1 text-xs text-gray-500 text-justify h-[15%]">
                    ক্লাব বিশ্বকাপে দুর্দান্ত শুরু করল প্যারিস সেন্ট-জার্মেই (পিএসজি)। রবিবার ক্যালিফোর্নিয়ার ঐতিহাসিক
                    র...
                </p>
            </a> --}}

            <!-- Right column -->
            <div class="flex flex-col space-y-4 w-full lg:w-1/4">
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
                <hr class="border-gray-200" />
                <a class="flex space-x-3 items-center" href="#">
                    <img alt="বাংলাদেশের ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস"
                        class="max-w-30 h-auto object-cover flex-shrink-0" src="https://placehold.co/300x200" />
                    <p class="text-sm  text-justify line-clamp-3">
                        বাংলাদেশ ফেন টাইমআউট টার্গেট করেছিল তা জানেন না ম্যাথিউস
                    </p>
                </a>
            </div>
        </div>
    </div>


</section>
@push('scripts')
    <script>

        // Data based on the provided image
        const stockData = [
            { name: 'RINS', price: 35.00, change: -0.28, percent: -0.28 },
            { name: 'STANDBANKL', price: 5.10, change: 0.10, percent: 1.92 },
            { name: 'STYLECRAFT', price: 51.50, change: 1.00, percent: 1.98 },
            { name: 'SUMITPOWER', price: 42.40, change: 0.00, percent: 0.00 },
            { name: 'SUNLIFEINS', price: 65.80, change: 2.50, percent: 3.95 },
            { name: 'TAKAFULINS', price: 30.80, change: -0.90, percent: -2.84 },
            { name: 'TALLUSPIN', price: 5.10, change: 0.10, percent: 2.00 },
            { name: 'TAMITEX', price: 95.20, change: 0.50, percent: 0.53 },
            { name: 'TITASGAS', price: 'N/A', change: 0.40, percent: 'N/A' } // Example for N/A data
        ];

        function buildMarqueeItem(stock) {
            let changeStatus = 'neutral';
            let iconClass = 'icon-neutral';
            
            if (stock.change > 0) {
                changeStatus = 'positive';
                iconClass = 'icon-up';
            } else if (stock.change < 0) {
                changeStatus = 'negative';
                iconClass = 'icon-down';
            }

            const changeValueText = stock.change > 0 ? `+${stock.change.toFixed(2)}` : stock.change.toFixed(2);
            const percentText = typeof stock.percent === 'number' ? `${stock.percent.toFixed(2)}%` : '0.00%';

            return `
                <div class="stock-item">
                    <div class="stock-info">
                        <span class="stock-name">${stock.name}</span>
                        <span class="stock-price">${typeof stock.price === 'number' ? stock.price.toFixed(2) : stock.price}</span>
                    </div>
                    <div class="stock-change-info ${changeStatus}">
                        <span class="change-value ${iconClass}">${changeValueText}</span>
                        <span class="change-percent">${percentText}</span>
                    </div>
                </div>
            `;
        }

        function populateMarquee() {
            const marqueeContent = document.getElementById('marquee-content');
            let generatedHTML = '';
            stockData.forEach(stock => {
                generatedHTML += buildMarqueeItem(stock);
            });
            
            // To create a seamless loop, we duplicate the content
            marqueeContent.innerHTML = generatedHTML + generatedHTML;
        }

        // Load the data when the page opens
        document.addEventListener('DOMContentLoaded', populateMarquee);

        
    </script>
@endpush