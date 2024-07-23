@extends('layouts.dop')

@section('page.title', 'Заявки на консультации')

@section('content')
<div class="container">
    <h1 class="text-center p-2">Заявки на консультации</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Комментарий</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->statusLabel }}</td>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->phone }}</td>
                    <td>{{ $question->comment }}</td>
                    <td>{{ $question->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.consultation.edit', $question->id) }}" class="btn btn-warning rounded-pill">Редактировать</a>
                        <a href="#" class="btn btn-danger rounded-pill">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
