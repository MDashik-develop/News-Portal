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
        <div class="container mx-auto flex flex-col lg:flex-row gap-4">
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

                @if ($poll)
                    <div class="mb-6 px-6 py-6 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">{{ $poll->question }}</h2>
                
                        @php
                            $totalVotes = $poll->options->sum('votes');
                            $colors = [
                                'bg-green-500 text-white',
                                'bg-yellow-400 text-gray-700',
                                'bg-red-500 text-white',
                                'bg-blue-500 text-white',
                                'bg-purple-600 text-white',
                                'bg-pink-500 text-white',
                                'bg-teal-500 text-white',
                                'bg-orange-500 text-white',
                                'bg-gray-500 text-white',
                                'bg-indigo-500 text-white',
                                'bg-lime-500 text-white',
                                'bg-emerald-500 text-white',
                                'bg-cyan-500 text-white',
                            ];
                        @endphp
                
                        <div class="space-y-5">
                            @foreach ($poll->options as $option)
                                @php
                                    $rawPercent = $totalVotes > 0 ? ($option->votes / $totalVotes) * 100 : 0;
                                    $percent = $rawPercent > 0 ? round($rawPercent) : 5;
                
                                    $isVoted = $votedOptionId !== null;
                                    $isSelected = $votedOptionId === $option->id;
                                    $disabled = $isVoted && !$isSelected;
                
                                    $color = $colors[$loop->index % count($colors)];
                                    $barOpacity = $disabled ? 'opacity-60' : 'opacity-100';
                                    $textColor = explode(' ', $color)[1];
                                @endphp
                
                                <button
                                    wire:click="vote({{ $option->id }})"
                                    type="button"
                                    class="w-full focus:outline-none"
                                    @if($disabled) disabled @endif
                                >
                                    <div class="mb-1 text-sm font-medium text-gray-800 dark:text-gray-200 text-left">
                                        {{ $option->option_text }}
                                    </div>
                                    <div class="relative w-full bg-gray-200 dark:bg-gray-700 rounded-full h-6 overflow-hidden cursor-pointer {{ $disabled ? 'cursor-not-allowed' : 'hover:opacity-90' }}">
                                        <div
                                            class="{{ $color }} h-6 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-500 {{ $barOpacity }}"
                                            style="width: {{ $percent }}%; min-width: 60px;"
                                            aria-label="{{ $option->option_text }} votes progress bar"
                                            role="progressbar"
                                            aria-valuenow="{{ $percent }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                        >
                                            <span class="px-4 select-none truncate" style="color: inherit;">
                                                {{ $rawPercent > 0 ? $percent . '%' : '0%' }}
                                            </span>
                                        </div>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                
                        {{-- Total Votes --}}
                        <div class="mt-4 text-right">
                            <small class="text-gray-600 dark:text-gray-400">Total Votes: {{ $totalVotes }}</small>
                        </div>
                    </div>
                @endif
            

            
            

            
            

            

                <div class=" mb-3 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Comments</h2>
                        
                        <!-- Comment Form -->
                        <div wire:ignore
                             class="fb-comments"
                            data-href="{{ url()->current() }}"
                            data-width="100%"
                            data-numposts="5">
                        </div>
                    </div>
                </div>
            </div>

            <aside class="md:w-[30%] lg:sticky lg:top-[50px] h-screen overflow-y-auto scrollbar-hidden rounded-xl border bg-[#e8f1ff] dark:bg-gray-900 p-3 mb-3">
                <div  wire:ignore id="default-carousel" class="relative w-full" data-carousel="slide">
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

                <div wire:ignore class="border-b border-gray-200 dark:border-gray-700">
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
                <div id="default-tab-content" class="overflow-y-auto"  wire:ignore>
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
                <div  wire:ignore class="post-view-autoplay-carousel">
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
    function reinitializeAll() {
        // Flowbite re-init
        if (window.initFlowbite) {
            window.initFlowbite();
        }

        // Facebook comment plugin
        if (typeof FB !== 'undefined' && FB.XFBML) {
            FB.XFBML.parse();
        }

        // Slick carousel re-init
        const $carousel = $('.post-view-autoplay-carousel');

        if ($carousel.hasClass('slick-initialized')) {
            $carousel.slick('unslick'); // destroy previous instance
        }

        $carousel.slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                { breakpoint: 1024, settings: { slidesToShow: 6 } },
                { breakpoint: 768, settings: { slidesToShow: 3 } },
                { breakpoint: 480, settings: { slidesToShow: 2 } }
            ]
        });
    }

    // Fire on initial load
    document.addEventListener('DOMContentLoaded', () => {
        reinitializeAll();
    });

    // Fire on Livewire navigation
    document.addEventListener('livewire:navigated', () => {
        reinitializeAll();
    });

    // Fire after DOM update (e.g., polling, event, action)
    document.addEventListener('livewire:updated', () => {
        reinitializeAll();
    });
    console.log("Livewire DOM updated – reinitializing");

</script>
@endpush

