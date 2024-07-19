<header>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
            <div class="d-flex flex-wrap">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('image/log.png') }}" alt="Логотип" height="80">
                </a>
            </div>
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
                        
                        <li class="nav-item">
                            <a href="#info" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Оборудование</a>
                        </li>
                        <li class="nav-item">
                            <a href="#price" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Прайс</a>
                        </li>
                        <li class="nav-item">
                            <a href="#calculate" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Калькулятор</a>
                        </li>
                        <li class="nav-item">
                            <a href="#application" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Заявка</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a href="#faq" class="nav-link px-2 text-white" onclick="closeOffcanvas()">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contacts" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Контакты</a>
                        </li></br>
                        <div style="mt-5">

                            @auth
                                @if(Auth::user()->is_admin)
                                    <li class="nav-item">
                                        <a href="{{ route('admin') }}" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Панель администратора</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('user') }}" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Личный кабинет</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" class="nav-link px-2 text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Выход
                                    </a>
                                </li>
                            @endauth

                            {{-- @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link px-2 text-yellow">
                                        Войти в личный кабинет
                                    </a>
                                </li><br>
                            @endguest --}}
                        </div>
                    </ul>
                </div>
            </div>
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