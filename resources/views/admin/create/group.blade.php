@include ('layouts.header')
<div class="wrapper wrapper-group">
@include ('layouts.wrap')
<body>
	<div class="container">
		<h3>Додати новий музичний Гурт</h3>
		@include ('error')
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['group.store']]) !!}
				<div class="form-group">
					<input type="text" class="form-control" name="group_name" required>
					{{Form::select('genre_id[]',$genres, 24, ['placeholder' => 'Оберіть жанр...'])}}
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close()!!}
			</div>
		</div>
	</div>
@include ('layouts.footer')	
</body>
</html>