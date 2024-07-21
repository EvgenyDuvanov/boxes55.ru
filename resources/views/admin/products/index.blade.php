@extends('layouts.dop')

@section('page.title', 'Каталог продукции')

@section('content')
<div class="container">
    <div class="p-4">
        <h1>Оборудование</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="" class="mx-2">
        <button type="button" class="btn btn-warning rounded-pill">Создать новый товар</button>
    </a>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-6 p-3">
                <div class="card mb-6 d-flex align-items-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="{{ url($product->photo) }}" class="review-image rounded-circle p-2">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->info }}</p>
                        <p class="card-text"> {{ $product->price_3_days }} / {{ $product->price_over_3_days }} ₽/день</p>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="mx-2">
                            <button type="button" class="btn btn-warning rounded-pill">Редактировать</button>
                        </a>
                        <a class="mx-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill" disabled>Удалить товар</button>
                        </a>
                    </div>
                </div> 
            </div>
        @endforeach

    </div>
    <div class="p-2">
        <h1>Комплекты</h1>
    </div>
    <a href="" class="mx-2">
        <button type="button" class="btn btn-warning rounded-pill">Создать новый комплект</button>
    </a>
    <div class="row">
        @foreach($sets as $set)
            <div class="col-md-6 p-4">
                <div class="card mb-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $set->name }}</h5>
                        <p class="card-text">{{ $set->price_3_days }} / {{ $set->price_over_3_days }} ₽/день</p>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{ route('admin.sets.edit', $set->id) }}" class="mx-2">
                            <button type="button" class="btn btn-warning rounded-pill">Редактировать</button>
                        </a>
                        <a class="mx-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill" disabled>Удалить комплект</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
.image-container {
    width: 230px;
    height: 230px;
    overflow: hidden;
    border-radius: 50%; /* Обрезка изображения до круга */
    display: flex;
    align-items: center;
    justify-content: center;
}

.review-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Обрезка изображения, сохраняя соотношение сторон */
}
</style>
@endsection
