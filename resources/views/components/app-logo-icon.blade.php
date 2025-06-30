<div>
    @php
        $website = \App\Models\website::first();
    @endphp
    @if (!empty($website) && !empty($website->logo))
        <img src="{{ asset('storage/' . $website->logo) }}">
    @else
        <img src="{{ asset('storage/website/defoultlogo.png') }}">
    @endif
</div>
