@extends('layouts.dop')

@section('page.title', 'Договоры')

@section('content')
<div class="container">
      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Договоры</h1>
     
    
</div>
@endsection
