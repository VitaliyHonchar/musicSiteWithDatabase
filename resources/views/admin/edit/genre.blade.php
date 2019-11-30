@include ('layouts.header')
<div class="wrapper wrapper-genre">
@include ('layouts.wrap')
<body>
	<div class="container">
		<h3>Змінити жанр {{$genre->genre_name}}</h3>		
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['genre.update', $genre->id], 'method'=> 'PUT']) !!}

				<div class="form-group">
					<input type="text" class="form-control" Name="genre_name"  value="{{$genre->genre_name}}" required>
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>