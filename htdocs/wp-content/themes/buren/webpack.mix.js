let mix = require("webpack-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.sass("./assets/scss/style.scss", "css/style.css")
    .options({
        processCssUrls: false
    })
    .setPublicPath("./assets/dist");
