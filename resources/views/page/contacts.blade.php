<div class="container">
    @if(session('success_quest'))
        <div class="alert alert-success">
            {{ session('success_quest') }}
        </div>
    @endif
    <div class="row justify-content-center align-items-center half-card">
        <div class="col-md-5">
            <h3>Наши контакты</h3>
            <p>Электронная почта: <a href="mailto:boxes55@mail.ru" class="no-decoration">boxes55@mail.ru</a></p>
            <p>Телефон для связи: <a href="tel:+79043286808" class="no-decoration">+7-904-328-68-08</a></p>

            <div class="text-center">
                <p>Социальные сети:</p>
                <ul class="nav d-flex justify-content-center flex-nowrapr">
                    <a href="https://vk.com/boxes55" class="no-decoration">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-vk" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 19h-4a8 8 0 0 1 -8 -8v-5h4v5a4 4 0 0 0 4 4h0v-9h4v4.5l.03 0a4.531 4.531 0 0 0 3.97 -4.496h4l-.342 1.711a6.858 6.858 0 0 1 -3.658 4.789h0a5.34 5.34 0 0 1 3.566 4.111l.434 2.389h0h-4a4.531 4.531 0 0 0 -3.97 -4.496v4.5z"></path>
                        </svg>
                    </a>
                    <a href="https://t.me/boxes155" class="no-decoration">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                        </svg>
                    </a>
                    <a href="https://wa.me/+79043286808" class="no-decoration">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                        </svg>
                    </a>
                </ul>
            </div>
        </div>

        <div class="col-md-2 mt-3">
        </div>

        <div class="col-md-4 text-right">
            <h3>Остались вопросы?</h3>
            {{-- <h5>Мы готовы на них ответить!</h5> --}}
            <p>Оставьте ваш номер телефона и мы перезвоним вам в ближайшее время!</p>
            <div class="text-center">
                <form method="post" action="{{ route('submit.question') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Ваше имя">
                    </div>
                    <div class="input-group mt-2">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="+7-000-000-0000">

                    </div>
                    <button type="submit" class="btn btn-secondary rounded-pill px-5 mt-2">Отправить!</button><br>
                    
                </form>
            </div>
        </div>
        
    </div>
</div>
