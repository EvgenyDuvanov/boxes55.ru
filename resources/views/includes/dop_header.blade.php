<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
            <div class="d-flex flex-wrap">
                <a class="navbar-brand" href="{{ url('') }}">
                    <img src="{{ url('image/log.png') }}" alt="Логотип" height="80">
                </a>
            </div>
            @auth
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">НАВИГАЦИЯ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-column">

                        @if(Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Панель администратора</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.clients') }}" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Клиенты</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products') }}" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Оборудование</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.application') }}" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Завки на аренду</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.consultation') }}" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Консультации</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.review') }}" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Отзывы</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('user') }}" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Мой профиль</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Заявки</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Оборудование</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Калькулятор</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Отзывы</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Обратная связь</a>
                            </li>

                        @endif
                        
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="nav-link px-2 text-grey" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Выход
                            </a>
                        </li><br>
                    </ul>
                </div>
            </div>
            @endauth
        </div>
    </nav>
</header>

<script>
    function closeOffcanvas() {
        var offcanvasElement = document.getElementById('offcanvasDarkNavbar');
        var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
        offcanvasInstance.hide();
    }
</script>

<style>
    .text-yellow {
        color: rgb(253, 194, 14);
    }
</style>