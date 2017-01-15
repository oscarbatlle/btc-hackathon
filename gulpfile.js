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
 var paths = {
      'main' : 'resources/assets/js'
 }
elixir((mix) => {
    mix.sass('app.scss')
    mix.sass('main.scss')

    .webpack('app.js')
    mix.scripts([
       "/node_modules/jquery/dist/jquery.min.js",
       "/node_modules/materialize-css/dist/js/materialize.min.js",
       "/node_modules/navigo/lib/navigo.min.js"
    ],'public/js/vendor.js', './'),
    mix.scripts([
       paths.main + "/helpers.js",
       paths.main + "/main.js"
    ],'public/js/main.js', './')
    .browserSync({proxy: 'bittastic.app'});
});
