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

mix
.copy(['resources/assets/image'], 'public/image')
.sass('resources/assets/sass/style.scss','public/css/style.css')
.scripts('node_modules/jquery/dist/jquery.js','public/js/jquery.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/bootstrap/bootstrap.js')
.scripts('node_modules/popper.js/dist/umd/popper.js','public/bootstrap/popper.js');
