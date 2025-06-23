<div class="home-autoplay-carousel px-4 py-1 rounded bg-[#e8f1ff] dark:bg-gray-900">
    <div class="p-2">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="{{ route('post.view', ['slug' => 1]) }}" wire:navigate>
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-2 ">
        <div
            class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="#">
                <div class="h-[50%]">
                    <img src="https://placehold.co/300x200" alt="" class="w-full h-auto ">
                </div>
                <div class="px-2 py-1">
                    <p class="line-clamp-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, animi.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
    $('.home-autoplay-carousel').slick({
    slidesToShow: 6,
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