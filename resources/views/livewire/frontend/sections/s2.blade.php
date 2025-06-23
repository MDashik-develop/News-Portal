<div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-10">
    @foreach ($section2 as $s2)
    <div 
        x-data="{ ready: false }" 
        x-init="setTimeout(() => ready = true, 500)">
        
        {{-- Placeholder Skeleton --}}
        <template x-if="!ready">
            <div class="p-1.5 bg-white border border-gray-200 rounded-lg shadow-sm animate-pulse">
                <div class="w-full h-[120px] bg-gray-300 rounded mb-2"></div>
                <div class="h-4 bg-gray-300 rounded w-5/6 mb-1"></div>
            </div>
        </template>

        {{-- Actual Post --}}
        <template x-if="ready">
            <a href="{{ route('post.view', ['slug' => $s2->slug]) }}" wire:navigate
                class="p-1.5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <img src="{{ asset('storage/' . $s2->featured_image) }}" alt="{{  $s2->title }}" class="rounded mb-1">
                <h5 class="text-base line-clamp-1 tracking-tight text-gray-900 dark:text-white">
                    {{ $s2->title }}
                </h5>
            </a>
        </template>
    </div>
    @endforeach
</div>
