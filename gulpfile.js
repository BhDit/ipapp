const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

wpConfig = {
    vue: {
        loaders: {
            css: 'vue-style-loader!css-loader',
            postcss: 'vue-style-loader!css-loader',
            less: 'vue-style-loader!css-loader!less-loader',
            sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax',
            scss: 'vue-style-loader!css-loader!sass-loader',
            stylus: 'vue-style-loader!css-loader!stylus-loader',
            styl: 'vue-style-loader!css-loader!stylus-loader',
            javascript: 'buble'
        }
    }
}
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
        .webpack('app.js',null,null,wpConfig)
        .webpack('pages/profile-edit.js',null,null,wpConfig);
});
