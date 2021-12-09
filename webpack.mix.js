const mix = require('laravel-mix');

// Dashboard
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/dashboard/dashboard.scss', 'public/css')
    .sourceMaps()
    .webpackConfig(require('./webpack.config'));

// Site
mix.js('resources/js/script.js', 'public/js/script.js')
    .js('resources/views/site/js/site.js', 'public/js/site.js')
    .vue()
    .css('resources/views/site/css/site.css', 'public/css/site.css')
    .sourceMaps()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
