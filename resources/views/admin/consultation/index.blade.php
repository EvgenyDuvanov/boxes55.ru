@extends('layouts.dop')

@section('page.title', 'Заявки на консультации')

@section('content')
<div class="container">
    <h1 class="text-center p-2">Заявки на консультацию</h1>

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
            @forelse($questions as $question)
                <tr>
                    <td>{{ $question->statusLabel }}</td>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->phone }}</td>
                    <td>{{ $question->comment }}</td>
                    <td>{{ $question->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.consultation.edit', $question->id) }}" class="btn btn-warning rounded-pill">Редактировать</a>
                        <form action="{{ route('admin.consultation.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Вы уверены, что хотите удалить эту заявку?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Нет заявок на консультацию</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
