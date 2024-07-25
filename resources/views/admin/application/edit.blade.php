@extends('layouts.dop')

@section('page.title', 'Редактирование заявки на аренду')

@section('content')
<div class="container p-4">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card p-4">
                <h1 class="text-center p-2">Редактирование заявки на аренду</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.application.update', $application->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-3 mt-1 border-top">
                        <div class="mb-3">
                            <div class="d-flex flex-wrap">
                                <div class="me-3 flex-grow-1">
                                    <label for="name" class="form-label">Фамилия Имя</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $application->name) }}" required>
                                </div>
                                <div class="me-3 flex-grow-1">
                                    <label for="phone" class="form-label">Телефон</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $application->phone) }}" required>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="status" class="form-label">Статус</label>
                                    <select class="form-control" id="status" name="status" required>
                                        @foreach(App\Enums\Status::select() as $value => $label)
                                            <option value="{{ $value }}" {{ old('status', $application->status->value) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 mt-1 border-top">
                        <div class="mb-3">
                            <div class="d-flex flex-wrap">
                                <div class="me-3 flex-grow-1">
                                    <label for="equipment" class="form-label">Оборудование</label>
                                    <input type="text" class="form-control" id="equipment" name="equipment" value="{{ old('name', $application->equipment ) }}" required>
                                </div>
                                <div class="me-3 flex-grow-1">
                                    <label for="first_date" class="form-label">Дата установки</label>
                                    <input type="date" class="form-control" id="first_date" name="first_date" value="{{ old('phone', $application->first_date) }}" required>
                                </div>
                                <div class="me-3 flex-grow-1">
                                    <label for="last_date" class="form-label">Дата установки</label>
                                    <input type="date" class="form-control" id="last_date" name="last_date" value="{{ old('phone', $application->last_date) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 mt-1 border-top">
                        <div class="mb-3">
                            <div class="d-flex flex-wrap">
                                <div class="me-3 flex-grow-1">
                                    <label for="car_model" class="form-label">Авто, модель</label>
                                    <input type="text" class="form-control" id="car_model" name="car_model" value="{{ old('name', $application->car_model) }}" required>
                                </div>
                                <div class="me-3 flex-grow-1">
                                    <label for="price" class="form-label">Стоимость аренды</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ old('phone', $application->price) }}">
                                </div>
                                {{-- <button type="button" class="btn btn-success rounded-pill px-3" onclick="calculateRent()">Произвести рассчет</button> --}}
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="comment" class="form-label">Комментарий</label>
                        <textarea class="form-control" id="comment" name="comment">{{ old('comment', $application->) }}</textarea>
                    </div> --}}

                    <button type="submit" class="btn btn-warning rounded-pill">Сохранить</button>
                </form>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('admin.application') }}" class="mx-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill">Отменить редактирование</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
