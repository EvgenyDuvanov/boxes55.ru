@extends('layouts.dop')

@section('page.title', 'Создание нового отзыва')

@section('content')
<div class="container">
    <div class="mt-4 p-4">
        <div class="row justify-content-center align-items-center half-card">
            <div class="col-md-8">
                <h3>Добавить новый отзыв</h3>
                
                <div class="text-center">
                    

                    <form method="post" action="{{ route('admin.review.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Имя, как в договоре" required>
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" name="car_model" class="form-control" placeholder="Марка авто" required>
                        </div>
                        <div class="input-group mt-2">
                            <textarea name="info" class="form-control pt-2" rows="5" placeholder="Отзыв. Желательно сделать со слов клиента, если клиент не сделал отзыв сам" required></textarea>
                        </div>
                        <p class="mt-2">Добавить фото авто:</p>
                        <div class="input-group mt-2">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning rounded-pill px-5 mt-3">Отправить!</button><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{  route('admin.review') }}" class="btn btn-secondary rounded-pill px-5 mt-3">Назад</a>
        </div>
    </div>
</div>
@endsection