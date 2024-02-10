<body>
    <h1>Новая заявка на аренду!</h1>
    <p>Имя: {{ $application->name }}</p>
    <p>Номер телефона: {{ $application->phone }}</p>
    <p>Авто, марка: {{ $application->car_model }}</p>
    <p>Оборудование: {{ $application->equipment }}</p>
    <p>Дата установки: {{ $application->first_date }}</p>
    <p>Дата возвращения: {{ $application->last_date }}</p>
</body>
