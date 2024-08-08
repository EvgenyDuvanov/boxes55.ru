@extends('layouts.dop')

@section('page.title', 'Редактирование заявки')

@section('content')
<div class="container p-4">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card p-4">
                <h1 class="text-center p-2">Редактирование заявки</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.consultation.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="contact" class="form-label">Контакт</label>
                        <div class="d-flex flex-wrap">
                            <div class="me-3 flex-grow-1">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $question->name) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="phone" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $question->phone) }}" required>
                            </div>
                            <div class="flex-grow-1">
                                <label for="status" class="form-label">Статус</label>
                                <select class="form-control" id="status" name="status" required>
                                    @foreach(App\Enums\Status::select() as $value => $label)
                                        <option value="{{ $value }}" {{ old('status', $question->status->value) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Комментарий</label>
                        <textarea class="form-control" id="comment" name="comment">{{ old('comment', $question->comment) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning rounded-pill">Сохранить</button>
                </form>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('admin.consultation') }}" class="mx-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill">Отменить редактирование</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
