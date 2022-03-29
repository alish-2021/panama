const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(
[
    'resources/js/jquery.js',
    'resources/js/slick.min.js',
    'resources/js/script.js',
    ], 'public/js/app.js');

mix.js('resources/js/app.js', 'public/js/vue.js')
    .vue();

mix.sass('resources/sass/app.scss', 'css')
    .sass('resources/sass/panel.scss', 'css') ;
