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
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/collapse.js', 'public/js')
    .js('resources/assets/js/datos.js', 'public/js')
    .js('resources/assets/js/edad.js', 'public/js')
    .js('resources/assets/js/editarPerfil.js', 'public/js')
    .js('resources/assets/js/jquery.datetimepicker.full.js', 'public/js')
    .js('resources/assets/js/modalCita.js', 'public/js')
    .js('resources/assets/js/modalProfile.js', 'public/js')
    .js('resources/assets/js/multiselect.js', 'public/js')
    .js('resources/assets/js/pedirCita.js', 'public/js')
    .js('resources/assets/js/select2.js', 'public/js')
    .js('resources/assets/js/validarConversation.js', 'public/js')
    .js('resources/assets/js/validarUser.js', 'public/js');
