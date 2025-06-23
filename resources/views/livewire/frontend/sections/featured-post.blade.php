@foreach ($featuredPosts as $featuredPost)
    <div 
        x-data="{ ready: false }" 
        x-init="setTimeout(() => ready = true, 500)"
        class="flex flex-col-reverse sm:flex-row gap-2 lg:w-8/12 mb-1.5">
        
        {{-- Placeholder Skeleton --}}
        <template x-if="!ready">
            <div class="flex flex-col-reverse sm:flex-row gap-2 lg:w-11/12 mb-1.5 p-2 animate-pulse border-b">
                <div class="w-full md:w-2/5 flex flex-col justify-between gap-3">
                    <div class="h-6 bg-gray-300 rounded w-11/12"></div>
                    <div class="h-5 bg-gray-300 rounded w-10/12"></div>
                    <div class="h-5 bg-gray-300 rounded w-3/4"></div>
                </div>
                <div class="w-full md:w-[600px] h-[273px] bg-gray-300 rounded"></div>
            </div>
        </template>

        {{-- Actual Post --}}
        <template x-if="ready">
            <a href="{{ route('post.view', ['slug' => $featuredPost->slug]) }}" wire:navigate
                class="flex flex-col-reverse sm:flex-row gap-2 mb-1.5">
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
                        alt="{{ $featuredPost->title }}" class="w-[600px] max-h-[273px] object-cover rounded">
                </div>
            </a>
        </template>
    </div>
@endforeach
