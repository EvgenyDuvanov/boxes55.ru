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

    var equipmentId = formData.get('equipment_id');
    var startDate = formData.get('start_date');
    var endDate = formData.get('end_date');

    if (!equipmentId || !startDate || !endDate) {
        alert('Пожалуйста, заполните все поля.');
        return;
    }

    var startDateObj = new Date(startDate);
    var endDateObj = new Date(endDate);

    if (isNaN(startDateObj.getTime()) || isNaN(endDateObj.getTime())) {
        alert('Пожалуйста, выберите корректные даты.');
        return;
    }

    if (startDateObj > endDateObj) {
        alert('Дата начала аренды не может быть позже даты возврата.');
        return;
    }

    startDateObj.setDate(startDateObj.getDate() + 1);
    endDateObj.setDate(endDateObj.getDate() + 1);

    formData.set('start_date', startDateObj.toISOString().split('T')[0]);
    formData.set('end_date', endDateObj.toISOString().split('T')[0]);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        var resultsDiv = document.getElementById('results');

        var numberOfDays = data.numberOfDays > 0 ? data.numberOfDays : 1;
        var totalCost = data.totalCost > 0 ? data.totalCost : data.costPerDay;

        resultsDiv.innerHTML = `
            <p>${data.item}</p>
            <p>С ${startDateObj.toLocaleDateString('ru-RU')} по ${endDateObj.toLocaleDateString('ru-RU')} включительно</p>
            <p>Количество дней (суток) аренды: ${numberOfDays}</p>
            <h3>Общая стоимость: ${totalCost} ₽</h3>
        `;
    })
    .catch(error => console.error('Error:', error));
}

</script>
