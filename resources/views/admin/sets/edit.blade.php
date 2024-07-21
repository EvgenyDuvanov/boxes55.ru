@extends('layouts.dop')

@section('page.title', 'Редактировать продукт')

@section('content')

<div class="container p-4">
    <h1 class="text-center p-2">Редактирование товара</h1>
<div class="container d-flex justify-content-center align-items-center">
    <div class="col-md-9">
        <div class="card p-3">

            <form action="{{ route('admin.sets.update', $set->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Наименование товара</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $set->name }}" required>
                </div>

                {{-- <div class="mb-3">
                    <label for="info" class="form-label">Описание товара</label>
                    <textarea class="form-control" id="info" name="info">{{ $product->info }}</textarea>
                </div> --}}

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="price_3_days" class="form-label">Стоимость до 3 дней аренды, ₽</label>
                        <input type="number" class="form-control" id="price_3_days" name="price_3_days" value="{{ $set->price_3_days }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="price_over_3_days" class="form-label">Стоимость более 3 дней аренды, ₽</label>
                        <input type="number" class="form-control" id="price_over_3_days" name="price_over_3_days" value="{{ $set->price_over_3_days }}" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-warning rounded-pill">Опубликовать изменения</button>
            </form>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('admin.products') }}" class="mx-2">
                <button type="button" class="btn btn-outline-secondary rounded-pill">Отменить редактирование</button>
            </a>
        </div>
    </div>
    
</div>
</div>
@endsection
