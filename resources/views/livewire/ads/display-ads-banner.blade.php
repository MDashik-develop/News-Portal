<div class="banner-ad-slot-container w-full my-1 p-0 bg-gray-100 dark:bg-gray-700 mx-auto">
    @if ($adSlot)

    {{-- যদি Ad Slot-এর ধরন 'google' হয় --}}
    @if ($adSlot->ad_type === 'google' && !empty($adSlot->google_ad_code))
    {{-- গুগল অ্যাডের কোড যেভাবে আছে সেভাবেই দেখানো হচ্ছে --}}
    {!! $adSlot->google_ad_code !!}

    {{-- যদি Ad Slot-এর ধরন 'personal' হয় এবং দেখানোর জন্য একটি পার্সোনাল অ্যাডও পাওয়া যায় --}}
    @elseif ($adSlot->ad_type === 'personal' && $personalAd)
        <a href="{{ $personalAd->target_link }}" target="_blank" rel="noopener noreferrer sponsored"
            class="container mx-auto">
            <div class="max-h-[90px] w-full max-w-[970px] mx-auto">
                <img src="{{ asset('storage/' . $personalAd->ad_image) }}" alt="Banner Advertisement">
            </div>
        </a>
    @endif

    @endif
</div>
