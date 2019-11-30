@include ('layouts.header')
<div class="wrapper wrapper-user">
@include ('layouts.wrap')
<table>
	<thead>
		<tr>
		<td>Id</td>
		<td>Ім'я користувача</td>
		<td>Емейл</td>
		<td>Адмін</td>
		<td>Дії</td>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->is_admin}}</td>
			<td>
			@if ($user->is_admin == 0)
			<a href="{{ route('user.edit', $user->id) }}">
				<i class="glyphicon glyphicon-thumbs-up"></i>
			</a>
			@else
			<a href="{{ route('user.edit', $user->id) }}">
				<i class="glyphicon glyphicon-thumbs-down"></i>
			</a>
			@endif
			@if ($user->is_admin == 0)
			{!! Form::open(['method' => 'DELETE',
			'route' => ['user.destroy', $user->id]]) !!}
				<button class="delete">
				<i class="glyphicon glyphicon-remove"></i></button>
			{!! Form::close() !!}
			@else
			@endif
		</td>
	</tr>
		@endforeach
	</tbody>	
</table>
<div class="paginator">
{{$users->links()}}
</div>
@include ('layouts.footer')
</body>
</html>