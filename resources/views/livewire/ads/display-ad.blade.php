<div class="ad-slot-container mb-4 text-center max-w-7xl  mx-auto">
    {{-- প্রথমে চেক করা হচ্ছে যে এই লোকেশনের জন্য কোনো فعال Ad Slot পাওয়া গেছে কি না --}}
    @if ($adSlot)

    {{-- যদি Ad Slot-এর ধরন 'google' হয় --}}
    @if ($adSlot->ad_type === 'google' && !empty($adSlot->google_ad_code))
    {{-- গুগল অ্যাডের কোড যেভাবে আছে সেভাবেই দেখানো হচ্ছে --}}
    {!! $adSlot->google_ad_code !!}

    {{-- যদি Ad Slot-এর ধরন 'personal' হয় এবং দেখানোর জন্য একটি পার্সোনাল অ্যাডও পাওয়া যায় --}}
    @elseif ($adSlot->ad_type === 'personal' && $personalAd)
    <a href="{{ $personalAd->target_link }}" target="_blank" rel="noopener noreferrer sponsored">
        <img src="{{ asset('storage/' . $personalAd->ad_image) }}" alt="Advertisement"
            class="inline-block max-w-full h-auto">
    </a>
    @endif

    @endif
</div>