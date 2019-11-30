@include ('layouts.header')
<div class="wrapper wrapper-group">
@include ('layouts.wrap')
<body>
	<div class="container">
		<h3>Змінити гурт {{$group->group_name}}</h3>		
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['group.update', $group->group_id], 'method'=> 'PUT']) !!}

				<div class="form-group">
					<input type="text" class="form-control" Name="group_name"  value="{{$group->group_name}}" required>
					{{Form::select('genre_id[]',$genres, $group->genre_id, ['placeholder' => 'Оберіть жанр...'])}}
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>