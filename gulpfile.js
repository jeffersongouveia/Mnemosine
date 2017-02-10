var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
    // mix.copy('node_modules/font-awesome/css', 'public/fonts/css');
    // mix.copy('node_modules/font-awesome/fonts', 'public/fonts/fonts');
    // mix.copy('node_modules/font-awesome/less', 'public/fonts/less');
    // mix.copy('node_modules/font-awesome/scss', 'public/fonts/scss');

    // mix.copy('node_modules/clipboard/dist/clipboard.min.js', 'resources/assets/js');

    // mix.copy('node_modules/bulma/sass/', 'resources/assets/sass/');
    // mix.copy('node_modules/bulma/bulma.sass', 'resources/assets/sass/');

    mix.sass('app.scss');
    mix.webpack('app.js');
});
