const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

    mix.js('resources/js/app.js', 'public/js')
    mix.sass('resources/sass/app.scss', 'public/css');
    mix.js('resources/js/admin/darkside.js', 'public/admin/js/')
    mix.sass('resources/sass/admin/darkside.scss', 'public/admin/css');
