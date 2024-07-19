@extends('layouts.dop')

@section('page.title', 'Мой профиль')

@section('content')
<div class="">
    <div class="back-one">
        <div class="container">
           <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h4>Информация о пользователе</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Фамилия Имя Отчество:</strong></div>
                    <div class="col-sm-8">Иванов Иван Иванович</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Дата рождения:</strong></div>
                    <div class="col-sm-8">01.01.1990</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Номер телефона:</strong></div>
                    <div class="col-sm-8">+7 (900) 123-45-67</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Электронная почта:</strong></div>
                    <div class="col-sm-8">ivanov@example.com</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Адрес регистрации:</strong></div>
                    <div class="col-sm-8">г. Москва, ул. Пушкина, д. 10, кв. 5</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Марка автомобиля, год выпуска:</strong></div>
                    <div class="col-sm-8">Toyota Camry, 2015</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Тип крыши автомобиля:</strong></div>
                    <div class="col-sm-8">Седан</div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
