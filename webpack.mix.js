const mix = require('laravel-mix');

const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')


const config = {
plugins: [
    new VuetifyLoaderPlugin()
],
}

mix.webpackConfig(config)

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
