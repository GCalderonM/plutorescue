const mix = require('laravel-mix');
const WebpackShellPluginNext = require('webpack-shell-plugin-next');

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
        require("tailwindcss"),
    ])
    .sass('resources/scss/main.scss', 'public/css')
    .js('resources/assets/js/usersDatatable.js', 'public/js')
    .js('resources/assets/js/donetyping.js', 'public/js')
    .js('resources/assets/js/filepond.js', 'public/js');

mix.webpackConfig({
    plugins: [
        new WebpackShellPluginNext({
            onBuildStart: {
                scripts: ['php artisan lang:js --quiet']
            }
        })
    ],
});
