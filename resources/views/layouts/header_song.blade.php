@include ('layouts.header')
<div class="wrapper">
	<div class="wrap">
		<header>
		<h1>Popsi.net</h1>
        <form action="{{ route('search.song') }}" method="GET">
            <input type="text" placeholder="Пошук" name="sq" value="">
            
            <button class="delete" type="submit">
            <i class="glyphicon glyphicon-search"></i></button>
        </form>

            @if (Route::has('login'))
            @auth
              <span class="label label-danger"><a href="{{route('song.add')}}">Додати пісню</a></span>
                @endauth
            @endif
		@include ('layouts.user_menu')
</header>	


	