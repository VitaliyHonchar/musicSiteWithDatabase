@include ('layouts.header')
<div class="wrapper wrapper-song">
@include ('layouts.wrap')
<body>
	<div class="container">
		<h3>Додати нову пісню</h3>
		@include ('error')
		<div class="row">
			<h3>За допомогою форми яка знаходиться нижче, ви можете додати пісню на сайт. Зауважте те що пісня додана користувачем не буде доступна на сайті доки не прийде модерацію. Для найбільшої імовірності додавання вашого файлу, будь ласка вводьте правильні дані.</h3>
			<div class="col-md-12">
				{!! Form::open(['route'=> ['song.store'],'files' => true]) !!}
				<div class="form-group">
					<input type="text" class="form-control" name="title" placeholder="Введіть назву пісні" required="required">
					<input type="text" pattern="[0-9.]+" required="required" maxlength="4" class="form-control" name="year_release" placeholder="Введіть рік виходу пісні">
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