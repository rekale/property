const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

   	mix.styles([
		'../../../bower_components/sb-admin-2/css/bootstrap.css',
		'../../../bower_components/sb-admin-2/css/plugins/metisMenu/metisMenu.css',
		'../../../bower_components/sb-admin-2/css/sb-admin-2.css',
		'../../../bower_components/sb-admin-2/css/plugins/morris.css',
		'../../../bower_components/sb-admin-2/font-awesome-4.1.0/css/font-awesome.css',	
	], 'public/assets/css/app.css');

   	mix.copy('bower_components/sb-admin-2/font-awesome-4.1.0/fonts', 'public/assets/fonts');

	mix.scripts([
		'../../../bower_components/sb-admin-2/js/jquery-1.11.0.js',
		'../../../bower_components/sb-admin-2/js/bootstrap.js',
		'../../../bower_components/sb-admin-2/js/plugins/metisMenu/metisMenu.js',
		'../../../bower_components/sb-admin-2/js/plugins/morris/morris.min.js',
		'../../../bower_components/sb-admin-2/js/plugins/morris/raphael.min.js',
		'../../../bower_components/sb-admin-2/js/sb-admin-2.js'
	], 'public/assets/js/app.js');
});
