<div class="container p-3">
    <div class="row">
        <div class="col-md">
            <div class="card h-100 mt-2">
                <div class="card-header d-flex justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag-plus me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>
                    <h5 class="mb-0">Заявки на аренду</h5>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center text-center">
                    <div class="me-4">
                        <h6>Всего</h6>
                        <p class="card-text">{{ $totalApp }}</p>
                    </div>
                    <div class="me-4">
                        <h6>Новые</h6>
                        <p class="card-text">{{ $newApp }}</p>
                    </div>
                    <div class="me-4">
                        <h6>В процессе</h6>
                        <p class="card-text">{{ $inProgressApp }}</p>
                    </div>
                    <div>
                        <h6>Закрытые</h6>
                        <p class="card-text">{{ $closedApp }}</p>
                    </div>
                </div>
                <p>
                    <a href="{{ route('admin.application') }}" class="btn btn-warning rounded-pill">Подробнее о заявках</a>
                </p>
            </div>
        </div>
    </div>
</div>