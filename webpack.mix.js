const mix = require('laravel-mix');

mix.copyDirectory('resources/assets', 'public/assets');
mix.copyDirectory('resources/images', 'public/images');

mix.js('resources/js/app.js', 'public/js').sourceMaps().vue();

mix.sass('resources/sass/app.scss', 'public/css');
