@extends('layouts.dop')

@section('page.title', 'Договоры')

@section('content')
<div class="container">
    <h1 class="text-center p-2">Договоры</h1>

    <a href="{{ route('admin.contracts.create') }}">
        <button type="button" class="btn btn-warning rounded-pill">Создать новый договор</button>
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Фамилия Имя</th>
                <th>Телефон</th>
                <th>Установка</th>
                <th>Снятие</th>
                <th>Оборудование</th>
                <th>Стоимость</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contracts as $contract)
                <tr>
                    <td>{{ $contract->status->label() }}</td>
                    <td>{{ $contract->last_name }} {{ $contract->first_name }}</td>
                    <td>{{ $contract->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($contract->first_date)->format('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($contract->last_date)->format('d F Y') }}</td>
                    <td>{{ $contract->equipment }}</td>
                    <td>{{ number_format($contract->price, 0, '.', ',') }} ₽</td>
                    <td>
                        {{-- <a href="{{ route('admin.contracts.download', $contract->id) }}" class="btn btn-secondary rounded-circle" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                            </svg>
                        </a> --}}
                        <a href="{{ route('admin.contracts.edit', $contract->id) }}" class="btn btn-warning rounded-circle" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm('Вы уверены, что хотите удалить этот договор?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Нет договоров</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
