@php
    $favourites = json_decode(\Cookie::get('favourites'));
@endphp
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ (request()->is('/') == '/' ? '#' : url('/')) }}">Ogłoszenia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 d-flex navbar-nav-scroll" style="--bs-scroll-height: 200px;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Front::portal.offers.favourites') }}">
                        @if(is_array($favourites) && count($favourites))
                            <i class="fas fa-heart"></i>
                        @else
                            <i class="far fa-heart"></i>
                        @endif
                    </a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Front::cms.profile') }}"><i class="far fa-user"></i></a>
                    </li>
                    <li class="nav-item nav-item-new__offer">
                        <a class="nav-link fw-bold" href="{{ route('Front::portal.profile.offers.create') }}">Utwórz nowe</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Front::cms.login') }}">Logowanie</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
