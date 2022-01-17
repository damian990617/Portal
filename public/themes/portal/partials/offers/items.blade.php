@php
    $favourites = json_decode(\Cookie::get('favourites'));
@endphp
@foreach($offers as $offer)
    @php
        if (!isset($edit) || !$edit) {
            $offerUrl = route('Front::portal.offers.show', ['offer' => $offer->slug]);
        } else {
            $offerUrl = route('Front::portal.profile.offers.edit', ['id' => $offer->id]);
        }
    @endphp
    <div class="col-12">
        <div class="form-floating p-4 prod-item d-flex @if(isset($edit) && !$offer->active) not__accepted @endif"
             data-url="{{ $offerUrl }}">
            @if(!isset($edit))
                <span class="favourite-icon"
                      data-url="{{ route('Front::portal.offers.favourites.change') . '?offer_id=' . $offer->id }}">
                <i class="far fa-heart @if(!is_array($favourites) || (is_array($favourites) && !in_array($offer->id, $favourites))) active @endif"></i>
                <i class="fas fa-heart @if(is_array($favourites) && in_array($offer->id, $favourites)) active @endif"></i>
            </span>
            @endif
            <div class="prod-item-content d-flex w-100">
                <div class="prod-img">
                    @if($offer->hasMedia())
                        @foreach($offer->getMedia() as $media)
                            <img class="img" src="{{ $offer->getMediaUrl($media) }}" alt="{{$offer->name}}">
                        @endforeach
                    @endif
                </div>
                <div class="prod-info ps-3">
                    <div class="prod-title h2 fw-bolder">{{ ucfirst($offer->name) }}</div>
                    <div class="prod-prices fw-bolder">{!! price_format($offer->price) !!}</div>
                    <div class="prod-content">
                        {{ \Str::limit($offer->short_content, 150, '[...]') }}
                        <hr>
                        <div class="d-flex justify-content-end">
                            <div>ID: <span class="fw-bold">{{ $offer->id }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
