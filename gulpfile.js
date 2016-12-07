var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([
    	'app.less',
    	'admin-lte/AdminLTE.less',
    	'bootstrap/bootstrap.less'
	], 'public/css/vendor.css')
	.webpack([
		'app.js'
	], 'public/js/main.js');
});
