@include ('layouts.header')
<body>
<div class="wrapper wrapper-group">
@include ('layouts.wrap')
<table>
	<thead>
		<tr>
		<td>Id</td>
		<td>Назва Гурту</td>
		<td>Назва Жанру</td>
		<td><a href="{{route('group.create')}}" class="btn btn-danger">Створити</a>
</td>
		</tr>
	</thead>
	<tbody>
		@foreach($groups as $group)
		<tr>
			<td>{{$group->group_id}}</td>
			<td>{{$group->group_name}}</td>
			<td>{{$group->genre_name}}</td>
			<td>
			<a href="{{ route('group.edit', $group->group_id) }}">
				<i class="glyphicon glyphicon-pencil"></i>
			</a>
			{!! Form::open(['method' => 'DELETE',
			'route' => ['group.destroy', $group->group_id]]) !!}
				<button class="delete">
				<i class="glyphicon glyphicon-remove"></i></button>
			{!! Form::close() !!}
		</td>
	</tr>
		@endforeach
	</tbody>	
</table>
<div class="paginator">
{{$groups->links()}}
</div>
@include ('layouts.footer')
</body>
</html>