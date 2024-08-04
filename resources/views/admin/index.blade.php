@extends('layouts.dop')

@section('page.title', 'Панель администратора')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="container p-3">
    <h2>Панель администратора</h2>
    <div class="row">
        <div class="col-md-6 ">
            @include('admin.dash.users')
        </div>
        <div class="col-md-6 ">
            @include('admin.dash.application')
        </div>
    </div>
</div>

@endsection
