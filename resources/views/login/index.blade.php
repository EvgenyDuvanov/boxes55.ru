@extends('layouts.dop')

@section('page.title', 'Страница входа')

@section('content')
<div class="container">
    <div class="mt-4 p-4">
        <div class="row justify-content-center align-items-center half-card">
                <div class="col-md-5">
                <h3>Вход в личный кабинет</h3>

                <div class="text-center border form-control">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Электронная почта') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-check center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                {{ __('Запомнить меня') }}
                            </label>
                        </div>

                        <button type="submit" class="btn btn-warning rounded-pill w-50 mb-2">{{ __('Войти!') }}</button>
                    </form>
                </div>
                <div class="p-2">Еще не создан аккаунт? <a href="{{ route('registration') }}" style="text-decoration: none;">Зарегистрироваться!</a></div>
            </div>
            <div>
                <a href="{{ url('') }}" class="btn btn-secondary rounded-pill px-5 mt-3">Вернуться на главную страницу</a>
            </div>
        </div>
    </div>
</div>
@endsection
