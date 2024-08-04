@extends('layouts.dop')

@section('page.title', 'Пользователи')

@section('content')
<div class="container">
    <h1 class="text-center p-2">Пользователи</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Статус</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Регистраиия</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                   <td>{{ $user->is_admin ? 'Админ' : 'Клиент' }}</td>
                    <td>{{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}</td>
                    <td>{{ $user->mobile_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.clients.edit', $user->id) }}" class="btn btn-warning rounded-pill">Редактировать</a> --}}
                        <form action="{{ route('admin.clients.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Вы уверены, что хотите удалить данные об этом пользователе?')">Удалить</button>
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
