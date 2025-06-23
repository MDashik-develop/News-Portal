<div class="grid grid-cols-1 pt-2 sm:pt-0 lg:w-4/12">
    @foreach ($section1 as $s1)
    <div 
        x-data="{ ready: false }" 
        x-init="setTimeout(() => ready = true, 500)">
        {{-- Placeholder Skeleton --}}
        <template x-if="!ready">
            <div class="flex justify-between items-center gap-2 border-b-1 max-h-min p-1 sm:p-2 animate-pulse">
                <div class="flex-3/4 space-y-2">
                    <div class="h-4 bg-gray-300 rounded w-full"></div>
                    <div class="h-4 bg-gray-300 rounded w-5/6"></div>
                    <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                </div>
                <div class="w-[120px] h-[75px] bg-gray-300 rounded"></div>
            </div>
        </template>

        {{-- Actual Post --}}
        <template x-if="ready">
            <a href="{{ route('post.view', ['slug' => $s1->slug]) }}" wire:navigate 
                class="flex justify-between items-center gap-2 border-b-1 max-h-min">
                <h5
                    class="mb-2 w-50 leading-[24px] flex-3/4 text-base line-clamp-3 tracking-tight text-gray-900 dark:text-white overflow-hidden max-h-[70px]">
                    {{ $s1->title }}
                </h5>
                <img src="{{ asset('storage/' . $s1->featured_image) }}" alt="{{ $s1->title }}"
                    class="mb-2 max-w-30 max-h-[75px]">
            </a>
        </template>
    </div>

    @endforeach
</div>