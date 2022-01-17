@php
    $links = [
        'Panel' => route('Front::cms.profile'),
        'Profil' => route('Front::cms.profile.edit'),
        'Ogłoszenia' => [
            'Lista' => route('Front::portal.profile.offers.index'),
            'Nowe' => route('Front::portal.profile.offers.create')
        ],
        'Wyloguj' => route('Front::cms.logout'),
    ];
@endphp
<div class="list-group">
    @foreach($links as $trans => $route)
        <a href="{{ !is_array($route) ? $route : '#' }}"
           class="list-group-item list-group-item-action @if($route && $route == url()->current()) active @endif @if(!$route || is_array($route)) disabled @endif">
            {{ $trans }}
        </a>
        @if(is_array($route))
            @foreach($route as $t => $r)
                <a href="{{ $r }}"
                   class="pl-2 list-group-item list-group-item-nested list-group-item-action @if($r == url()->current()) active @endif @if(!$route) disabled @endif">
                    {{ $t }}
                </a>
            @endforeach
        @endif
    @endforeach
</div>
