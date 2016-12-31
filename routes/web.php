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

	Route::resource('apartments.albums', 'AlbumsController');

	Route::resource('apartments.albums.photos', 'PhotosController', ['except' => ['edit', 'update']]);

	Route::get('notifications', [
		'as' => 'notification.index',
		'uses' => 'NotificationsController@index',
	]);

});
