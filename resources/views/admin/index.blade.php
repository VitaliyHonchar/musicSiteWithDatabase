@include ('layouts.header')
<div class="wrapper wrapper-admin">
@include ('layouts.wrap')
<body>

	<h1>Вітаємо у адміністративній панелі сайту popsi.net</h1>
	<h2>
		Тут ви можете змінювати вміст сайту

	</h2>
	<div class="image_container">
		<div class="img">
			<a href="{{route('genre.index')}}"><img src="http://www.songpopmusic.com/wp-content/uploads/2012/07/Indierock.jpg" alt="">
			Жанри</a>
		</div>
		<div class="img">
			<a href="{{route('song.index')}}"><img src="https://infographicsmania.com/wp-content/uploads/2014/01/Rock-Music-Through-the-Decades.jpg" alt="">
			Пісні</a>
		</div>
		<div class="img">
			<a href="{{route('user.index')}}"><img src="https://www.asthmamd.org/images/icon_user_1.png" alt="">
			Користувачі</a>
		</div>
		<div class="img">
			<a href="{{route('group.index')}}"><img src="https://americansongwriter.com/wp-content/uploads/2010/01/rock_band_cover.jpg" alt="">
			Групи</a>
		</div>
	</div>
@include ('layouts.footer')	
</body>
</html>