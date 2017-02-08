let mix = require('laravel-mix').mix;

mix.sass('resources/assets/sass/app.scss','public/css')
    .js('resources/assets/js/app.js','public/js')
    .js('resources/assets/js/pages/profile-edit.js','public/js')
    .js('resources/assets/js/pages/problems-page.js','public/js')
    .js('resources/assets/js/pages/problem-page.js','public/js')
    .minify('public/js');
