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

elixir(function (mix) {
    mix
        .sass('app.scss')
        .scripts([
            '../vendor/jquery/dist/jquery.js',
            '../vendor/bootstrap-sass/assets/javascripts/bootstrap.js',
            'app.js'
        ], 'public/js/app.js')
        .version([
            'css/app.css',
            'js/app.js'
        ])
        .copy("resources/assets/vendor/font-awesome/fonts", "public/build/fonts");
});