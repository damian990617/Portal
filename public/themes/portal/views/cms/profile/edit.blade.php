<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12 mb-4">
            <h3 class="fw-bold fs-3">Edycja użytkownika</h3>
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            <form action="{{ route('Front::cms.profile.change') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="input--name" class="form-label">Imię</label>
                    <input type="text" name="name" class="form-control" id="input--name" value="{{ $item->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--username" class="form-label">Nazwa użytkownika</label>
                    <input type="text" name="username" class="form-control" id="input--username" value="{{ $item->username }}">
                    @if($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--email" class="form-label">Email <small> ( Nie masz uprawnień )</small></label>
                    <input type="email" class="form-control" id="input--email" value="{{ $item->email }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="input--tel" class="form-label">Numer telefonu</label>
                    <input type="number" name="options[tel]" class="form-control" id="input--tel" value="{{ $item->options['tel'] ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="input--password" class="form-label">Hasło</label>
                    <input type="password" name="password" class="form-control" id="input--password">
                </div>
                <div class="mb-3">
                    <label for="input--password_confirmation" class="form-label">Powtórz hasło</label>
                    <input type="password" name="password_confirmation" class="form-control" id="input--password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>
</div>
