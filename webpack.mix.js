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

mix.setPublicPath('./wp-content/themes/NOair/public/')
    .js('wp-content/themes/NOair/resources/js/script.js', 'wp-content/themes/NOair/public/js/')
    .sass('wp-content/themes/NOair/resources/sass/style.scss', 'wp-content/themes/NOair/public/css/')
    .copy('wp-content/themes/NOair/resources/fonts', 'wp-content/themes/NOair/public/fonts')
    .copy('wp-content/themes/NOair/resources/assets', 'wp-content/themes/NOair/public/assets')
    //.copy('resources/video', 'public/video')
    //.copy('resources/favicon', 'public/favicon')
    //.copy('resources/favicon/favicon.ico', 'public/favicon.ico')
    .options({
        processCssUrls: false
    })
    .browserSync({
        proxy: 'noair.test',
        notify: false
    })
    .version();
