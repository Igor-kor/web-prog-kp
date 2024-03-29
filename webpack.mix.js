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



// // mix.browserSync('http://127.0.0.1:8000');
mix.browserSync({
    host: 'localhost',
    port: 3000,
    proxy: 'http://127.0.0.1:8000',
    files: [
        'resources/views/**/*.php',
        'public/js/**/*.js',
        'public/js/**/*.vue',
        'public/css/**/*.css'
    ],
    watchOptions: {
        ignored: /node_modules/
    }
});

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    })
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);
