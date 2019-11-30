<?php

Route::get('/', 'HomeController@index')->name('home');
// Створюємо групу роутів з префіксом адмін які будуть викристовуватися у адміністративній панелі.
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function(){
Route::get('/', 'AdminController@index')->name('admin.index');
Route::resource('/genre', 'GenreController');
Route::resource('/song', 'SongController');
Route::get('/song/change/{id}', 'SongController@change')->name('song.change');
Route::resource('/group', 'GroupController');
Route::resource('/genre', 'genreController');
Route::resource('/user', 'UsersController');
});
//////////////////////////////////////////////////
Route::get('/search', 'HomeController@search')->name('search.song');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
Route::get('add/', 'HomeController@create')->name('song.add');
Route::post('adddddd/', 'HomeController@store')->name('add');
});