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
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}

mix.copy('resources/css/custom.css', 'public/css/custom.css');
mix.copy('resources/css/htag.css', 'public/css/htag.css');
mix.copy('resources/css/ckeditor.css', 'public/css/ckeditor.css');
mix.copy('resources/css/flickity.min.css', 'public/css/flickity.min.css');
mix.copy('resources/css/select2.tailwind.css', 'public/css/select2.tailwind.css');
mix.copy('resources/js/jquery.js', 'public/js/jquery.js');
mix.copy('resources/js/custom.js', 'public/js/custom.js');
mix.copy('resources/js/flickity.pkgd.min.js', 'public/js/flickity.pkgd.min.js');
mix.copy('resources/js/sweetalert.min.js', 'public/js/sweetalert.min.js');
mix.copy('resources/js/jquery.datatable.min.js', 'public/js/jquery.datatable.min.js');
mix.copy('resources/ckeditor', 'public/ckeditor');