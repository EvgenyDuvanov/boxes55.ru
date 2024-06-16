<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12 half-card">
            
            <h3>ЗАЯВКА НА АРЕНДУ</h3>
            <form method="post" action="{{ route('submit.application') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2 form-group">
                        <label for="name" class="form-label">Имя и Фамилия</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Иван Иванов" required>
                    </div>

                    <div class="col-md-4 mb-2 form-group">
                        <label for="phone" class="form-label">Номер телефона</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+7-000-000-0000" required>
                    </div>

                    <div class="col-md-4 mb-2 form-group">
                        <label for="carModel" class="form-label">Марка и модель авто</label>
                        <input type="text" class="form-control" id="carModel" name="car_model" placeholder="Ford Mustang 2022" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-2 form-group">
                        <label for="equipment" class="form-label">Оборудование</label>
                        <select name="equipment" id="equipment" class="form-control">
                            <option value="" disabled selected>Выберите товар или комплект</option>
                            @foreach($products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                            @foreach($sets as $set)
                                <option value="{{ $set->name }}">{{ $set->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-2 form-group">
                        <label for="start_date" class="form-label">Дата установки оборудования:</label>
                        <input type="date" name="first_date" id="first_date" class="form-control">
                    </div>

                    <div class="col-md-4 mb-2 form-group">
                        <label for="end_date" class="form-label">Дата вашего возвращения:</label>
                        <input type="date" name="last_date" id="last_date" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-warning rounded-pill px-5 mt-2">Оставить заявку</button><br>

                <small>Оставляя заявку, Вы соглашаетесь на обработку Ваших персональных данных.</small>
            </form>
        </div>
    </div>
</div>