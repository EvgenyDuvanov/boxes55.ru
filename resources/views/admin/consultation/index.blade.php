@extends('layouts.dop')

@section('page.title', 'Отзывы')

@section('content')
<div class="container">
    <h3 class="pt-3">Консультации</h3>
    <div class="text-center p-2 d-flex justify-content-center">
        <a href="" class="mx-2">
            <button type="button" class="btn btn-warning rounded-pill">Создать новый отзыв</button>
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    </div>
</div>



@endsection
