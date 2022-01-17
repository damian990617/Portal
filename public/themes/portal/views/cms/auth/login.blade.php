<div class="container pt-5 mb-5">
    <h1 class="pb-3 fw-bolder">Formularz logowania</h1>
    <div class="row align-items-center">
        <div class="col-md-6 col-xs-12">
            <form method="POST" action="{{ route('Front::cms.login_post') }}" class="loginForm">
                @csrf
                <div class="mb-3">
                    <label for="input--email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="input--email">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--password" class="form-label">Hasło</label>
                    <input type="password" name="password" class="form-control" id="input--password">
                </div>
                <button type="submit" class="btn">Zaloguj</button>
            </form>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="auth-desc text-center">
                <p class="fw-bold fs-4">Nie posiadasz jeszcze konta?</p>
                <a href="{{ route('Front::cms.register') }}" class="btn">Utwórz</a>
            </div>
        </div>
    </div>
</div>
