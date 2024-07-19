@extends('layouts.dop')

@section('page.title', 'Страница регистрации')

@section('content')
<div class="container">
  <div class="mt-2 p-2">
    <div class="row justify-content-center align-items-center half-card">
      <div class="col-md-5">
        <div class="text-center border form-control">
          <h3 class="mt-2">Регистрация</h3>
          <form method="post" action="{{ route('registration.store') }}" class="p-2 mt-2">
            @csrf
            <div class="form-floating mt-2">
              <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Фамилия" value="{{ old('last_name') }}">
              <label>Фамилия</label>
              @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-floating mt-2">
              <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Имя" value="{{ old('first_name') }}" autofocus>
              <label>Имя</label>
              @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            {{-- <div class="form-floating mt-2">
              <input type="text" name="middle_name" class="form-control" placeholder="Отчество">
              <label>Отчество</label>
            </div> --}}

            <div class="form-floating mt-2">
              <input type="text" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="+7-987-654-3210" value="{{ old('mobile_number') }}">
              <label>Номер телефона</label>
              @error('mobile_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-floating mt-2">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="primer@mail.ru" value="{{ old('email') }}">
              <label>Электронная почта</label>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-floating mt-2">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*******">
              <label>Придумайте пароль</label>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-floating mt-2">
                <input type="password" name="password_confirmation" class="form-control" placeholder="*******">
                <label>Повторите пароль</label>
            </div>

            <div class="form-check mt-2 center">
              <input type="checkbox" name="consent" class="form-check-input @error('consent') is-invalid @enderror" id="consent">
              <label class="form-check-label" for="consent">Я принимаю согласие на предоставление, хранение и обработку моих персональных данных</label>
              @error('consent')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <button class="btn btn-warning rounded-pill w-50 mt-3" type="submit">Создать аккаунт</button>
            {{-- <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p> --}}
          </form>
        </div>

        <div class="p-2">
          Аккаунт уже создан? 
          <a href="{{ route('login') }}" style="text-decoration: none;">
            Войти!
          </a>
        </div>
        <div>
          <a href="{{ url('') }}" class="btn btn-secondary rounded-pill px-5 mt-3">Вернуться на главную страницу</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
