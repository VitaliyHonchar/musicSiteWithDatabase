@include ('layouts.header')
<div class="wrapper wrapper-song">
@include ('layouts.wrap')
<table>
	<thead>
		<tr>
		<td>id</td>
		<td>Назва Групи</td>
		<td>Назва пісні</td>
		<td>Рік виходу</td>
		<td>Назва Жанру</td>
		<td>Посилання</td>
		<td><a href="{{route('song.create')}}" class="btn btn-danger">Створити</a></td>

		</tr>
	</thead>
	<tbody>
		@foreach($songs as $song)
		<tr>
			<td>{{$song->id}}</td>
			<td>{{$song->group_name}}</td>
			<td>{{$song->title}}</td>
			<td>{{$song->year_release}}</td>
			<td>{{$song->genre_name}}</td>
			<td>{{$song->song_link}}</td>
			<td>
			<a href="{{ route('song.edit', $song->id) }}">
				<i class="glyphicon glyphicon-pencil"></i>
			</a>
			@if ($song->status == 0)
			<a href="{{ route('song.change', $song->id) }}">
				<i class="glyphicon glyphicon-thumbs-up"></i>
			</a>
			@else
			<a href="{{ route('song.change', $song->id) }}">
				<i class="glyphicon glyphicon-thumbs-down"></i>
			</a>
			@endif
			{!! Form::open(['method' => 'DELETE',
			'route' => ['song.destroy', $song->id]]) !!}
				<button class="delete">
				<i class="glyphicon glyphicon-remove"></i></button>
			{!! Form::close() !!}
		</td>
	</tr>
		@endforeach
	</tbody>	
</table>
<div class="paginator">
{{$songs->links()}}
</div>
@include ('layouts.footer')
</body>
</html>