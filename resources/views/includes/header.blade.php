<header>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid" style="padding-left: 35px; padding-right: 30px;">
            <div class="d-flex flex-wrap">
                <a class="navbar-brand" href="{{ url('') }}">
                    <img src="{{ url('image/log.png') }}" alt="Логотип" height="70">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="d-none d-md-flex flex-row">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a href="#info" id="nav-info" class="nav-link px-2 text-white">Оборудование</a>
                    </li>
                    <li class="nav-item">
                        <a href="#price" id="nav-price" class="nav-link px-2 text-white">Прайс</a>
                    </li>
                    <li class="nav-item">
                        <a href="#calculate" id="nav-calculate" class="nav-link px-2 text-white">Калькулятор</a>
                    </li>
                    <li class="nav-item">
                        <a href="#application" id="nav-application" class="nav-link px-2 text-white">Заявка</a>
                    </li>
                    <li class="nav-item">
                        <a href="#reviews" id="nav-reviews" class="nav-link px-2 text-white">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a href="#faq" id="nav-faq" class="nav-link px-2 text-white">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contacts" id="nav-contacts" class="nav-link px-2 text-white">Контакты</a>
                    </li>

                    @auth
                        @if(Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" id="nav-admin" class="nav-link px-2 text-yellow">Панель администратора</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('user') }}" id="nav-user" class="nav-link px-2 text-yellow">Личный кабинет</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>

            <!-- Mobile Menu -->
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
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
                            <a href="#info" id="offcanvas-info" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Оборудование</a>
                        </li>
                        <li class="nav-item">
                            <a href="#price" id="offcanvas-price" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Прайс</a>
                        </li>
                        <li class="nav-item">
                            <a href="#calculate" id="offcanvas-calculate" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Калькулятор</a>
                        </li>
                        <li class="nav-item">
                            <a href="#application" id="offcanvas-application" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Заявка</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" id="offcanvas-reviews" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a href="#faq" id="offcanvas-faq" class="nav-link px-2 text-white" onclick="closeOffcanvas()">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contacts" id="offcanvas-contacts" class="nav-link px-2 text-white" onclick="closeOffcanvas()">Контакты</a>
                        </li></br>
                        <div style="mt-5">
                            @auth
                                @if(Auth::user()->is_admin)
                                    <li class="nav-item">
                                        <a href="{{ route('admin') }}" id="offcanvas-admin" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Панель администратора</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('user') }}" id="offcanvas-user" class="nav-link px-2 text-yellow" onclick="closeOffcanvas()">Личный кабинет</a>
                                    </li>
                                @endif
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

    function setActiveLink() {
        if (window.innerWidth >= 768) { // Apply only for desktop view
            const currentUrl = window.location.hash;
            const menuItems = document.querySelectorAll('.d-md-flex .nav-link');
            
            menuItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href === currentUrl) {
                    item.classList.add('active-head');
                } else {
                    item.classList.remove('active-head');
                }
            });
        }
    }

    window.addEventListener('load', setActiveLink);
    window.addEventListener('hashchange', setActiveLink);
    window.addEventListener('resize', setActiveLink);
</script>
 
<style>
    .text-yellow {
        color: rgb(253, 194, 14);
    }

    .active-head {
        font-weight: bold;
        border-bottom: 4px solid rgb(252, 201, 49);
    }
</style>
