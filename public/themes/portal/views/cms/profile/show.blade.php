<div class="bg-gray">
    <div class="container pt-5 mb-4">
        <div class="pb-4 profile d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="initials fs-4">{{ ucfirst($item->username[0]) }}</div>
                <div class="ms-3">
                    <h1 class="fw-bold fs-5 m-0">{{ $item->username }}</h1>
                    <small>Konto od: <b>{{ $item->created_at->format('d-m-Y') }}r.</b></small>
                </div>
            </div>
            @if($item->options['tel'] ?? false)
                <div>
                    <span class="btn ml-2 p-2 btn-contact" data-tel="{{ $item->options['tel'] }}">Zadzwoń</span>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <h2 class="fw-bold fs-3 text-center">Ogłoszenia</h2>
    <div class="products row">
        @if($offers->count())
            @partial('offers.items')
            <div class="d-flex justify-content-center mt-4">
                {{ $offers->links() }}
            </div>
        @else
            <h2>Nie znaleziono ogłoszeń.</h2>
        @endif
    </div>
</div>
