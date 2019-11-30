
	<div class="wrap">
		<header>
		<h1>Popsi.net</h1>
		<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}">Домашня Сторінка</a>
                    @else
                        <a href="{{ route('login') }}">Авторизуватися</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Зареєструватися</a>
                        @endif
                    @endauth
                </div>
            </div>
            @endif
            </header>	


		