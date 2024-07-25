@extends('layouts.dop')

@section('page.title', 'Заявки на аренду')

@section('content')
<div class="container">
    <h1 class="text-center p-2">Заявки на аренду</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Оборудование</th>
                <th>Установка</th>
                <th>Снятие</th>
                <th>Стоимость</th>
                <th>Aвто</th>
                <th>Создана</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $application)
                <tr>
                    <td>{{ $application->statusLabel }}</td>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->phone }}</td>
                    <td>{{ $application->equipment }}</td>
                    <td>{{ \Carbon\Carbon::parse($application->first_date)->translatedFormat('j F') }}</td>
                    <td>{{ \Carbon\Carbon::parse($application->last_date)->translatedFormat('j F') }}</td>
                    <td>{{ $application->price }}</td>
                    <td>{{ $application->car_model }}</td>
                    <td>{{ $application->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.application.edit', $application->id) }}" class="btn btn-warning rounded-pill">Редактировать</a>
                        <form action="{{ route('admin.application.destroy', $application->id) }}" method="POST" style="display:inline;">
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
