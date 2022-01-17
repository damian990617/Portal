<div class="gray-bg">
    <div class="container">
        <div class="search-form pt-4 pb-4">
            <form action="{{ route('Front::portal.offers.search') }}" method="GET">
                <div class="row">
                    <div class="col-md-11 col-xs-12">
                        <div class="search">
                            <input type="text" name="q" class="p-3 form-control" placeholder="Szukaj ogłoszenie">
                        </div>
                    </div>
                    <div class="col-md-1 col-xs-12">
                        <button class="btn p-3 m-auto d-block">Szukaj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    @if($categories->count())
        <div class="categories m-4">
            <h2 class="text-center fw-bolder fs-3">Kategorie</h2>
            <hr class="hr">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="block pt-3 pb-3"
                             onclick="window.location.href='{{ route('Front::portal.categories.show', ['slug' => $category->slug]) }}'">
                            @if($category->hasMedia())
                                @foreach($category->getMedia() as $media)
                                    <div class="img text-center">
                                        <img class="rounded"
                                             src="{{ $category->getMediaUrl($media) }}"
                                             alt="{{$category->name}}">
                                    </div>
                                @endforeach
                            @endif
                            <p class="text-center pt-2">{{ $category->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($promotedOffers->count())
        <div class="m-4">
            <h2 class="text-center fw-bolder fs-3">Promowane ogłoszenia</h2>
            <hr class="hr">
            <div class="bg-gray row products">
                @partial('offers.items', ['offers' => $promotedOffers])
            </div>
        </div>
    @endif
</div>
