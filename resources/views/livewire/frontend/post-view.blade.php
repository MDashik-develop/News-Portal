<section>
@push('post-head')
    @php
        $website = \App\Models\website::first();
    @endphp
    <title>{{ $website->title}}-{{ $post->title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    <meta name="keywords" content="{{ $post->keywords ?? $website->meta_tags }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $post->featured_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $post->featured_image) }}">
    <meta name="author" content="{{ $post->user?->name ?? 'Unknown' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="bn">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="x-default">
@endpush
    <!-- Breadcrumbs -->
    <div class="container mx-auto px-2 py-6 text-ellipsis whitespace-nowrap">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('home') }}">Home</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">{{ $post->category?->name ?? 'Uncategorized' }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ Str::limit($post->title, 40, '...') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>
    <div class="min-h-screen">
        <!-- Post Content -->
        <div class="container mx-auto flex flex-col lg:flex-row gap-4">
            <div class="md:w-[70%]">
                <div class=" mb-5 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900 shadow-md">
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
                                <img src="{{ asset('storage' . $post->user?->profile_image ?? 'Unknown') }}"
                                    alt="{{  $post->user?->name }}" class=" rounded-full w-6 h-6 mb-1">
                                {{ $post->user?->name ?? 'Unknown' }}
                            </span>
                            <span><i class="far fa-eye mr-1"></i>{{ $post->view_count ?? 0 }} views</span>
                        </div>
                    </div>
                    <div class="prose prose-lg max-w-none dark:prose-invert mb-12">
                        {!! $post->content !!}
                    </div>
                </div>

                @if ($poll)
                <div
                    class="mb-6 px-6 py-6 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-md">
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
                        $barOpacity = $disabled ? 'opacity-40 cursor-not-allowed' : 'opacity-100';
                        $textColor = explode(' ', $color)[1];
                        @endphp

                        <button wire:click="vote({{ $option->id }})" type="button" class="w-full focus:outline-none"
                            @if($disabled) disabled @endif>
                            <div class="mb-1 text-sm font-medium text-gray-800 dark:text-gray-200 text-left">
                                {{ $option->option_text }}
                            </div>
                            <div
                                class="relative w-full bg-gray-200 dark:bg-gray-700 rounded-full h-6 overflow-hidden cursor-pointer {{ $disabled ? 'cursor-not-allowed' : 'hover:opacity-90' }}">
                                <div class="{{ $color }} h-6 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-500 {{ $barOpacity }}"
                                    style="width: {{ $percent }}%; min-width: 60px;"
                                    aria-label="{{ $option->option_text }} votes progress bar" role="progressbar"
                                    aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
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

                <div class=" mb-3 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900 shadow-md">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Comments</h2>

                        <!-- Comment Form -->
                        <div wire:ignore class="fb-comments" data-href="{{ url()->current() }}" data-width="100%"
                            data-numposts="5">
                        </div>
                    </div>
                </div>
            </div>

            <livewire:frontend.layouts.aside />
        </div>
    </div>

    <div>
        @if ($relatedPosts->count())
        <div class="bg-[#e8f1ff] border rounded-xl dark:bg-gray-900">
            <div class="container mx-auto px-2 py-2 text-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Related Posts</h2>
            </div>
            <div wire:ignore class="post-view-autoplay-carousel">
                @foreach ($relatedPosts as $related)
                <div class="p-2">
                    <div
                        class="p-1.5 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <a href="{{ route('post.view', ['slug' => $related->slug]) }}" wire:navigate>
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