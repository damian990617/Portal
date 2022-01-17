<div class="offer-content container pt-4 mb-5">
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="prod-img bg-gray p-4">
                @if($item->hasMedia())
                    @foreach($item->getMedia() as $media)
                        <a href="{{ $item->getMediaUrl($media) }}">
                            <img src="{{ $item->getMediaUrl($media) }}" alt="{{$item->name}}">
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="block--user_data p-4 mt-4">
                <div class="h3 fw-bolder">Użytkownik</div>
                <div class="mt-2 d-flex align-items-center">
                    <div class="initials">{{ ucfirst($author->username[0]) }}</div>
                    <div class="user_details">
                        <div class="h2 fw-bolder m-0">{{ $author->name }}</div>
                        <small>Konto od: <b>{{ $author->created_at->format('d-m-Y') }}r.</b></small>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn" style="margin-right: 10px;" href="{{ route('Front::portal.profile', ['username' => $author->username]) }}">Profil</a>
                    @if($author->options['tel'] ?? false)
                        <span class="btn ml-2 p-2 btn-contact" data-tel="{{ $author->options['tel'] }}">Zadzwoń</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="bg-gray p-4">
                <h1 class="text-capitalize fw-bold pb-2">{{ strtoupper($item->name) }}</h1>
                <p class="fw-bold">{!! price_format($item->price) !!} @if($item->negotiate)(Do negocjacji)@endif</p>
                <p>{{ $item->content }}</p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div>ID: <span class="fw-bold">{{ $item->id }}</span></div>
                    <div>Odwiedzin: <span class="fw-bold">{{ $item->total_visitors }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
