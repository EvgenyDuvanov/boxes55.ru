<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 card half-card">
            <h3>КАЛЬКУЛЯТОР АРЕНДЫ</h3>

            <form id="calculateForm" action="{{ route('calculate.rent') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="equipment_id" class="form-label">Выберите оборудование или набор:</label>
                    <select name="equipment_id" id="equipment_id" class="form-control">
                        <option value="" disabled selected>Выберите товар или комплект</option>
                        @foreach($products as $product)
                            <option value="product_{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                        @foreach($sets as $set)
                            <option value="set_{{ $set->id }}">{{ $set->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="start_date" class="form-label">Дата установки оборудования:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Дата вашего возвращения:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>
                <button type="button" class="btn btn-danger rounded-pill px-3" onclick="clearCalculator()">Очистить</button>
                <button type="button" class="btn btn-success rounded-pill px-3" onclick="calculateRent()">Рассчитать</button>
            </form>

            <div id="results" class="mt-4">
            </div>
        </div>
    </div>
</div>

<script>
   function calculateRent() {
    var form = document.getElementById('calculateForm');
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        // Функция для форматирования даты
        function formatDate(date) {
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(date).toLocaleDateString('ru-RU', options);
        }

        var resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = `
            <p>${data.item}</p>
            <p>С ${formatDate(data.startDate)} по ${formatDate(data.endDate)} включительно</p>
            <p>Количество дней аренды: ${data.numberOfDays}</p>
            <h3>Общая стоимость: ${data.totalCost} ₽</h3>
        `;
    })
    .catch(error => console.error('Error:', error));
}

    function clearCalculator() {
        var form = document.getElementById('calculateForm');
        form.reset();  // Reset the form to clear all inputs
        var resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';  // Clear the results display
}
</script>
