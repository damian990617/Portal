<div class="container mt-4">
    <h1 class="fs-3 pt-4 mb-3">Ulubione ogłoszenia</h1>
    <div class="products row">
        @if($items->count())
            @partial('offers.items', ['offers' => $items])
            <div class="d-flex justify-content-center mt-4">
                {{ $items->links() }}
            </div>
        @else
            <h2>Nie znaleziono ogłoszeń.</h2>
        @endif
    </div>
</div>
