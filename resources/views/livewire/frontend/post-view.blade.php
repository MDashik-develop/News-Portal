<section> 
    <!-- Breadcrumbs -->
    <div class="container mx-auto px-2 py-6 text-ellipsis whitespace-nowrap">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('home') }}">Home</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">{{ $post->category?->name ?? 'Uncategorized'     }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ Str::limit($post->title, 40, '...') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>
    <div class="min-h-screen">
        <!-- Post Content -->
        <div class="container mx-auto flex flex-col lg:flex-row gap-2">
            <div class="md:w-[70%]">
                <div class=" mb-3 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900">
                    <div class="mb-8">
                        <img src="{{  asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                            class="w-full h-auto object-cover rounded-lg shadow-lg">
                    </div>
                    <div class="mb-8">
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $post->title }}
                        </h1>
                        <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400">
                            <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->created_at->format('F j, Y')
                                }}</span>
                            <span class="flex items-center gap-1.5">
                                <img src="{{ asset('storage' . $post->user?->profile_image ?? 'Unknown') }}" alt="{{  $post->user?->name }}"
                                    class="rounded w-6 h-6 mb-1">
                                {{ $post->user?->name ?? 'Unknown' }}
                            </span>
                            <span><i class="far fa-eye mr-1"></i>{{ $post->views ?? 0 }} views</span>
                        </div>
                    </div>
                    <div class="prose prose-lg max-w-none dark:prose-invert mb-12">
                        {!! $post->content !!}
                    </div>
                </div>

                <div class=" mb-3 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Comments</h2>
                    
                    <!-- Comment Form -->
                    <div class="fb-comments"
                        data-href="{{ url()->current() }}"
                        data-width="100%"
                        data-numposts="5">
                    </div>
                </div>
                </div>
            </div>

            <aside class="md:w-[30%] lg:sticky lg:top-[50px] h-screen overflow-y-auto scrollbar-hidden rounded-xl border bg-[#e8f1ff] dark:bg-gray-900 p-3 mb-3">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-[200px] overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        <a href="{{ route('post.view', ['id' => 1]) }}" wire:navigate
                            class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://placehold.co/300x200"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </a>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://placehold.co/300x200"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://placehold.co/300x200"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://placehold.co/300x200"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://placehold.co/300x200"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
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
                    <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800"
                        id="latestPosts" role="tabpanel" aria-labelledby="latestPosts-tab">
                        <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                            @foreach ($letetstPosts as $letetstPost)
                            <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                <i class="fas fa-play text-[#d00] mt-1"></i>
                                <a href="{{ route('post.view', ['id' => $letetstPost->id]) }}" wire:navigate>
                                    <p class="line-clamp-2 max-h-min mb-1">
                                        {{ $letetstPost->title }}
                                    </p>
                                    <p class="text-[11px]">
                                        <i class="far fa-clock text-gray-500"></i>
                                        {{ $this->getBengaliTimeAgo($letetstPost->published_at) }} | <span
                                            class="text-[#d00]">{{ $letetstPost->category?->name ?? 'Uncategorized'
                                            }}</span>
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800"
                        id="todayBest" role="tabpanel" aria-labelledby="todayBest-tab">
                        <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                            @foreach ($todayBestPosts as $todayBestPost)
                            <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                <i class="fas fa-play text-[#d00] mt-1"></i>
                                <a href="{{ route('post.view', ['id' => $todayBestPost->id]) }}" wire:navigate>
                                    <p class="line-clamp-2 max-h-min mb-1">
                                        {{ $todayBestPost->title }}
                                    </p>
                                    <p class="text-[11px]">
                                        <i class="far fa-clock text-gray-500"></i>
                                        {{ $this->getBengaliTimeAgo($todayBestPost->published_at) }} | <span
                                            class="text-[#d00]">{{ $todayBestPost->category?->name ?? 'Uncategorized'
                                            }}</span>
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hidden p-4 my-1 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800"
                        id="weekBest" role="tabpanel" aria-labelledby="weekBest-tab">
                        <ul class="space-y-3 text-[13px] leading-snug text-[#333] max-h-[400px] overflow-y-auto">
                            @foreach ($weekBestPosts as $weekBestPost)
                            <li class="flex items-start border-b-1 py-2 space-x-2 rtl:space-x-reverse">
                                <i class="fas fa-play text-[#d00] mt-1"></i>
                                <a href="{{ route('post.view', ['id' => $weekBestPost->id]) }}" wire:navigate>
                                    <p class="line-clamp-2 max-h-min mb-1">
                                        {{ $weekBestPost->title }}
                                    </p>
                                    <p class="text-[11px]">
                                        <i class="far fa-clock text-gray-500"></i>
                                        {{ $this->getBengaliTimeAgo($weekBestPost->published_at) }} | <span
                                            class="text-[#d00]">{{ $weekBestPost->category?->name ?? 'Uncategorized'
                                            }}</span>
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div>
        @if ($relatedPosts->count())
            <div class="bg-[#e8f1ff] border rounded-xl dark:bg-gray-900">
                <div class="container mx-auto px-2 py-2 text-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Related Posts</h2>
                </div>
                <div class="post-view-autoplay-carousel">
                    @foreach ($relatedPosts as $related)
                    <div class="p-2">
                        <div
                            class="p-1.5 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <a href="{{ route('post.view', ['id' => $related->id]) }}" wire:navigate>
                                <div class="h-[50%]">
                                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto rounded">
                                </div>
                                <div class="px-2 py-1">
                                    <p class="line-clamp-2">{{ $related->title }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@push('scripts')
    <script>
        document.addEventListener("livewire:navigated", () => {
            if (typeof FB !== 'undefined') {
                FB.XFBML.parse(); // Re-render Facebook comments
            }
        });


        $(document).ready(function(){
            $('.post-view-autoplay-carousel').slick({
            slidesToShow: 5,
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
@endpush