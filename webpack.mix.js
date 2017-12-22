let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'node_modules/jquery-treegrid/styles.css',
    'node_modules/jquery-treegrid/css/jquery.treegrid.css',
    'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
    'public/css/my_style.css',
    'node_modules/select2/dist/css/select2.min.css'
], 'public/css/all.css');


mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-treegrid/js/jquery.treegrid.js',
    'node_modules/jquery-treegrid/js/jquery.cookie.js',
    'node_modules/jquery-treegrid/js/jquery.treegrid.bootstrap2.js',
    'node_modules/jquery-treegrid/js/jquery.treegrid.bootstrap3.js',
    'bower_components/moment/moment.js',
    'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    'node_modules/select2/dist/js/select2.min.js',
    'resources/assets/js/select2boss.js',
    'resources/assets/js/imageLoader.js',
    'resources/assets/js/search.js'

], 'public/js/all.js');
