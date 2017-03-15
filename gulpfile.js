var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */



elixir(function(mix) {

    //mix.less('app.less');
    //mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/assets/fonts');
   	//mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');

   	mix.styles([
		'resources/assets/css/pace-theme-flash.css',
		'resources/assets/css/bootstrap.min.css',
		'resources/assets/css/bootstrap-theme.min.css',
		'resources/assets/css/font-awesome.min.css',
		'resources/assets/css/metisMenu.min.css',
        'resources/assets/css/sb-admin-2.css',
        'resources/assets/css/timeline.css',
    ], 'public/assets/stylesheets/styles.css', './');

    mix.styles([
        'resources/assets/css/datatable/*.css',
    ], 'public/assets/stylesheets/datatable.css', './');


    mix.scripts([
        //'bower_components/bootstrap/dist/js/...'
        'resources/assets/js/pace.min.js',
        'resources/assets/js/jquery.min.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/metisMenu.min.js',
        'resources/assets/js/sb-admin-2.js',
    ], 'public/assets/scripts/frontend.js', './');

    mix.scripts([
        'resources/assets/js/datatable/*.js',
    ], 'public/assets/scripts/datatable.js', './');

});



