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
    //JS
    .copy("./node_modules/admin-lte/plugins/jquery/jquery.min.js", "public/thema/js/jquery.min.js")
    .copy("./node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js", "public/thema/js/bootstrap.bundle.min.js")
    .copy("./node_modules/admin-lte/dist/js/adminlte.min.js", "public/thema/js/adminlte.min.js")
    .copy("./node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css", "public/thema/plugins/fontawesome-free/css/all.min.css")
    .copy("./node_modules/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js", "public/thema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")
    //CSS
    .copy("./node_modules/admin-lte/dist/css/adminlte.min.css", "public/thema/dist/css/adminlte.min.css")
    .copy("./node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css", "public/thema/plugins/fontawesome-free/css/all.min.css")
    .copyDirectory("./node_modules/admin-lte/plugins/fontawesome-free/webfonts", "public/thema/plugins/fontawesome-free/webfonts")
    .copy("./node_modules/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css", "public/thema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
