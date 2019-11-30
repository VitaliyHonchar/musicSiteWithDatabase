@include ('layouts.header')
<body>
<div class="wrapper wrapper-genre">
@include ('layouts.wrap')
<table>
	<thead>
		<tr>
		<td>Id</td>
		<td>Назва Жанру</td>
		<td><a href="{{route('genre.create')}}" class="btn btn-danger">Створити</a></td>
		</tr>
	</thead>
	<tbody>
		@foreach($genres as $genre)
		<tr>
			<td>{{$genre->id}}</td>
			<td>{{$genre->genre_name}}</td>
			<td>
			<a href="{{ route('genre.edit', $genre->id) }}">
				<i class="glyphicon glyphicon-pencil"></i>
			</a>
			{!! Form::open(['method' => 'DELETE',
			'route' => ['genre.destroy', $genre->id]]) !!}
				<button class="delete">
				<i class="glyphicon glyphicon-remove"></i></button>
			{!! Form::close() !!}
		</td>
	</tr>
		@endforeach
	</tbody>	
</table>
<div class="paginator">
{{$genres->links()}}
</div>
@include ('layouts.footer')
</body>
</html>