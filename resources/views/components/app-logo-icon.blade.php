<div>
    @php
        $website = \App\Models\website::first();
    @endphp
    @if (!empty($website) && !empty($website->logo))
        <img src="{{ asset('storage/' . $website->logo) }}">
    @else
        <div>
            
        </div>
    @endif
</div>
