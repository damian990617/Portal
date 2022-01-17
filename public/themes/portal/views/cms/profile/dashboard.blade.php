<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12 mb-4">
            <h3 class="fw-bold fs-3 mt-2">Witaj, {{ $item->name ? $item->name : $item->username }}!</h3>
        </div>
    </div>
</div>
