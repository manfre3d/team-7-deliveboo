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

mix.js('resources/js/backoffice/app.js', 'public/js')
    .js('resources/js/front/front.js', 'public/js')
    .js('resources/js/backoffice/crud_plate_type.js', 'public/js')
    .js('resources/js/backoffice/crud_delete_plate.js', 'public/js')
    .js('resources/js/backoffice/register_user.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/front/front.scss', 'public/css');
