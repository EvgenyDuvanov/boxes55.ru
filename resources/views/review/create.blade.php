@extends('layouts.dop')

@section('page.title', 'Отзыв')

@section('content')
<div class="container">
    <div class="mt-4 p-4">
        <div class="row justify-content-center align-items-center half-card">
                <div class="col-md-8">
                <h3>Форма обратной связи</h3>
                <p>Поделитесь со всеми своим честным отзывом, для нас важно ваше мнение!</p>
                
                <div class="text-center">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('review.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" name="car_model" class="form-control" placeholder="Марка вашего авто">
                        </div>
                        <div class="input-group mt-2">
                            <textarea name="info" class="form-control pt-2" rows="5" placeholder="Как прошла ваша поездка с нашим оборудованием? Вы остались довольны нашим сервисом?"></textarea>
                        </div>
                        <p class="mt-2">Добавьте самое лучшее фото Вашего автомобиля c нашим оборудованием, что бы мы могли опубликовть Ваш отзыв на нашем сайте:</p>
                        <div class="input-group mt-2">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-warning rounded-pill px-5 mt-3">Отправить!</button><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ url('') }}" class="btn btn-secondary rounded-pill px-5 mt-3">Вернуться на главную страницу</a>
        </div>
    </div>
</div>
@endsection