@include ('layouts.header')
<div class="wrapper wrapper-genre">
@include ('layouts.wrap')
<body>

	<div class="container">
		<h3>Додати новий жанр</h3>
		@include ('error')
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['genre.store']]) !!}
				<div class="form-group">
					<input type="text" class="form-control" name="genre_name" required>
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close()!!}
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>