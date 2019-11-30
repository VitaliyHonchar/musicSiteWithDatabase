@include ('layouts.header')
<div class="wrapper">
@include ('layouts.wrap')
	<div class="container">
		<h3>Додати нову пісню</h3>
		@include ('error')
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['route'=> ['add'],'files' => true]) !!}
				<div class="form-group">
					<h3>На цій сторінці ви можете додати пісню на сайт, для цього вам обов'язково потрібно заповнити усі поля форми, та натиснути кнопку підтвердити. Якщо у нашій базі даних не існує потрібного вам виконавця або жанру то оберіть відповідні значення з випадаючого списку.
					Пісня з'явиться на сайті лише після модерації, якщо вона не з'явилася на протязі кількох годин отже ви вказали інформацію неправильно, або пісня не відповідає вимогам сайту.</h3>
					<input type="text" class="form-control" name="title" placeholder="Введіть назву пісні" required>
					<input type="text" pattern="[0-9.]+"  maxlength="4" class="form-control" name="year_release" placeholder="Введіть рік виходу пісні" required>
					{{Form::select('genre_id[]',$genres, 24, ['placeholder' => 'Оберіть жанр...'])}}
					{{Form::select('group_id[]', $groups, 17, ['placeholder' => 'Оберіть групу...'])}}
					<input type="file" name="song_link" accept=".mp3" required> 
					<button class="btn btn-success">Підтвердити</button>
				</div>
				{!! Form::close()!!}
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>