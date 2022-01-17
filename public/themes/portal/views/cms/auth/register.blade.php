<div class="container pt-5 mb-5">
    <h1 class="pb-3 fw-bolder">Formularz rejestracyjny</h1>
    <div class="row align-items-center">
        <div class="col-md-6 col-xs-12">
            <form method="POST" action="{{ route('Front::cms.register_post') }}" class="registerForm">
                @csrf
                <div class="mb-3">
                    <label for="input--name" class="form-label">Imię</label>
                    <input type="text" name="name" class="form-control" id="input--name">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--username" class="form-label">Nazwa użytkownika</label>
                    <input type="text" name="username" class="form-control" id="input--username">
                    @if($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
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
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="mb-3">
                    <label for="input--password_confirmation" class="form-label">Powtórz hasło</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           id="input--password_confirmation">
                </div>
                <button type="submit" class="btn">Zarejestruj</button>
            </form>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="auth-desc text-center">
                <p class="fw-bold fs-4">Posiadasz już konto?</p>
                <a href="{{ route('Front::cms.login') }}" class="btn">Zaloguj</a>
            </div>
        </div>
    </div>
</div>
