<div class="container p-3">
    <div class="row">
        <div class="col-md">
            <div class="card h-100 mt-2">
                <div class="card-header d-flex justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill me-2" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                    <h5 class="mb-0">  Пользователи</h5>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center text-center">
                    <div class="me-5">
                        <h6>Всего</h6>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                    <div class="me-5">
                        <h6>Админы</h6>
                        <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                    <div>
                        <h6>Новых за месяц</h6>
                        <p class="card-text">{{ $userMounth }}</p>
                    </div>
                </div>
                <p>
                    <a href="{{ route('admin.clients') }}" class="btn btn-warning rounded-pill">Подробнее о пользователях</a>
                </p>
            </div>
        </div>
    </div>
</div>