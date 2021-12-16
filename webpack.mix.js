const mix = require('laravel-mix');




// This is a simple plugin that uses Imagemin to compress all images in your project.
// https://github.com/Klathmon/imagemin-webpack-plugin
let ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;


mix.webpackConfig( {
    plugins: [
        new ImageminPlugin( {
//            disable: process.env.NODE_ENV !== 'production', // Disable during development
            pngquant: {
                quality: '95-100',
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        } ),
    ],
} )

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
    .js('resources/js/backoffice/crud_delete_plate.js', 'public/js')
    .js('resources/js/backoffice/register_user.js', 'public/js')
    .js('resources/js/backoffice/checkout.js', 'public/js')
    .js('resources/js/backoffice/checkout_cart_delete.js', 'public/js')    
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/front/checkout_page.scss', 'public/css')
    .sass('resources/sass/front/front.scss', 'public/css')
    .copy( 'resources/js/front/img', 'public/images', false );

