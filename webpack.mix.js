const mix = require("laravel-mix");

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

mix.webpackConfig({
    stats: {
        children: true,
    },
});

// mix.config.publicPath = "public_html";

//! public path
const public = "public";

//! set path input => output
const patchInputCSS = "resources/css";
const patchOutputCSS = public + "/css";

const patchInputJS = "resources/js";
const patchOutputJS = public + "/js";

// window.$ = window.jQuery = require("jquery");

mix.copy(`${patchInputJS}/**/!(app.js)`, patchOutputJS);
mix.copy("resources/img/", public + "/img");

mix.js(`${patchInputJS}/app.js`, patchOutputJS)
    // .js("resources/js/ie8.js", patchOutputJS)
    // .js("resources/js/init.js", patchOutputJS)
    // .js("resources/js/jquery.js", patchOutputJS)
    // .js("resources/js/modernizr.custom.js", patchOutputJS)
    // .js("resources/js/nicescroll.js", patchOutputJS)
    // .js("resources/js/owl-carousel.js", patchOutputJS)
    // .js("resources/js/typed.js", patchOutputJS)

    .postCss(`${patchInputCSS}/normalize.css`, patchOutputCSS)
    .postCss(`${patchInputCSS}/base.css`, patchOutputCSS)
    // .postCss(`${patchInputCSS}/style.scss`, patchOutputCSS)
    .postCss(`${patchInputCSS}/app.css`, patchOutputCSS, [
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

// mix.copy("public", "htdocs");
