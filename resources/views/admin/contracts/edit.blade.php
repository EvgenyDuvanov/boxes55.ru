@extends('layouts.dop')

@section('page.title', 'Редактирование договора')

@section('content')
<div class="container p-4">
    <h2 class="text-center p-2">Редактирование договора</h2>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-10">

            <form action="{{ route('admin.contracts.update', $contract->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card mt-3">
                    <div class="m-3">
                        <h4>Личные данные</h4>
                        <div class="d-flex flex-wrap">
                            <div class="me-3 flex-grow-1">
                                <label for="last_name" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $contract->last_name) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="first_name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $contract->first_name) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="middle_name" class="form-label">Отчество</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $contract->middle_name) }}" required>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap p-1">
                            <div class="me-3 flex-grow-1">
                                <label for="birth_date" class="form-label">Дата рождения</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $contract->birth_date) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="phone" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contract->phone) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="m-3">
                        <h4>Паспортные данные</h4>
                        <div class="d-flex flex-wrap">
                            <div class="me-3 flex-grow-1">
                                <label for="passport" class="form-label">Серия и номер</label>
                                <input type="text" class="form-control" id="passport" name="passport" value="{{ old('passport', $contract->passport) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="passport_date" class="form-label">Дата выдачи</label>
                                <input type="date" class="form-control" id="passport_date" name="passport_date" value="{{ old('passport_date', $contract->passport_date) }}" required>
                            </div>
                            <div class="me-3 flex-grow-1">
                                <label for="passport_by" class="form-label">Кем выдан</label>
                                <input type="text" class="form-control" id="passport_by" name="passport_by" value="{{ old('passport_by', $contract->passport_by) }}" required>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap p-1">
                            <div class="flex-grow-1">
                                <label for="address" class="form-label">Адрес регистрации</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $contract->address) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="m-3">
                        <h4>Детали аренды</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_date" class="form-label">Установка</label>
                                <input type="date" class="form-control" id="first_date" name="first_date" value="{{ old('first_date', $contract->first_date) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_date" class="form-label">Снятие</label>
                                <input type="date" class="form-control" id="last_date" name="last_date" value="{{ old('last_date', $contract->last_date) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="equipment" class="form-label">Оборудование</label>
                                <select name="equipment" id="equipment" class="form-control" required>
                                    <option value="" disabled>Выберите товар или комплект</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->name }}" {{ old('equipment', $contract->equipment) == $product->name ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                    @foreach($sets as $set)
                                        <option value="{{ $set->name }}" {{ old('equipment', $contract->equipment) == $set->name ? 'selected' : '' }}>{{ $set->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Стоимость аренды</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $contract->price) }}" step="0.01">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="total_days" class="form-label">Количество дней аренды</label>
                                <input type="number" class="form-control" id="total_days" name="total_days" value="{{ old('total_days', $contract->total_days) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="status" class="form-label">Статус договора</label>
                                <select class="form-control" id="status" name="status" required>
                                    @foreach(App\Enums\StatusContract::select() as $value => $label)
                                        <option value="{{ $value }}" {{ old('status', $contract->status->value) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning rounded-pill m-3">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection
