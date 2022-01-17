<div class="container mt-3 mb-5">
    <div class="title d-flex align-items-center justify-content-center pt-3">
        <h1 class="fw-bolder fs-3 m-0">{{ $item->name }}</h1>
        <span class="total-products ml-2">{{ $offers->total() }}</span>
    </div>
    <div class="products bg-gray mt-3">
        @if($offers->total())
            @partial('offers.items')
            <div class="d-flex justify-content-center mt-4">
                {{ $offers->links() }}
            </div>
        @else
            <p>Nie znaleziono ogłoszeń.</p>
        @endif
    </div>
</div>
