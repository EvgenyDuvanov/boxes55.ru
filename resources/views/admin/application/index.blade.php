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
                        
                        <a href="{{ route('admin.application.edit', $application->id) }}" class="btn btn-warning rounded-circle" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </a>

                        <form action="{{ route('admin.application.destroy', $application->id) }}" method="POST" style="display:inline;">
                            <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm('Вы уверены, что хотите удалить эту заявку?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </button>
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
