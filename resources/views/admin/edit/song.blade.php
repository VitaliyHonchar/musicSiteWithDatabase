@include ('layouts.header')
<div class="wrapper wrapper-song">
@include ('layouts.wrap')
<body>
	<div class="container">
		<h3>Змінити пісню {{$song->title}}</h3>		
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['song.update', $song->id], 'method'=> 'PUT']) !!}
				<div class="form-group">
					<input type="text" class="form-control" Name="title" required="required" value="{{$song->title}}" placeholder="Назва Пісні">
					<input type="text" class="form-control" Name="year_release" pattern="[0-9.]+" value="{{$song->year_release}}" placeholder="Рік випуску пісні" required>
					{{Form::select('genre_id[]', $genres, $song->genre_id, ['placeholder' => 'Оберіть жанр...'])}}
					{{Form::select('group_id[]', $groups, $song->group_id, ['placeholder' => 'Оберіть групу...'])}}
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>