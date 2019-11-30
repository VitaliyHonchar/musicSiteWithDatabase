<div class="flex-center position-ref full-height">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Авторизуватися</a></li>
                    <li><a href="{{ route('register') }}">Зареєструватися</a></li>                
                @else             
                    
                        <li>
                            <a href="{{route ('logout')}}" 
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Вийти
                            </a>
                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                            </form>
                        </li>
            </ul>
        </div>
                @endif