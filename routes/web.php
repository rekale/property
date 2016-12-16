<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {

	Route::get('/home', 'HomeController@index');

	Route::resource('apartments', 'ApartmentsController');

	Route::resource('users', 'UsersController');

	Route::get('/albums', [
		'as' => 'albums.index',
		'uses' => 'AlbumsController@index'
	]);	
	Route::get('/albums/create', [
		'as' => 'albums.create',
		'uses' => 'AlbumsController@create'
	]);		
	Route::post('/albums', [
		'as' => 'albums.store',
		'uses' => 'AlbumsController@store'
	]);
	Route::get('/albums/upload', [
		'as' => 'albums.upload',
		'uses' => 'AlbumsController@upload'
	]);
	Route::post('/albums/upload/store', [
		'as' => 'albums.upload.store',
		'uses' => 'AlbumsController@uploadStore'
	]);
	Route::get('/albums/{id}', [
		'as' => 'albums.show',
		'uses' => 'AlbumsController@show'
	]);
	Route::get('/albums/{id}/edit', [
		'as' => 'albums.edit',
		'uses' => 'AlbumsController@edit'
	]);
	Route::get('/albums/{id}/images', [
		'as' => 'albums.show.images',
		'uses' => 'AlbumsController@showImages'
	]);
	Route::put('/albums/{id}', [
		'as' => 'albums.update',
		'uses' => 'AlbumsController@update'
	]);
	Route::delete('/albums/{id}', [
		'as' => 'albums.destroy',
		'uses' => 'AlbumsController@destroy'
	]);
});
