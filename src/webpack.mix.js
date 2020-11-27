const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
// , [
//     // .sass('resources/sass/app.scss', 'public/css');
// ]);
mix.js('resources/js/app.js', 'public/js')
    mix.sass("resources/sass/cart.scss", "public/css")
    .sass("resources/sass/delete_comp.scss", "public/css")
    .sass("resources/sass/delete_conf.scss", "public/css")
    .sass("resources/sass/home.scss", "public/css")
    .sass("resources/sass/login.scss", "public/css")
    .sass("resources/sass/regist.scss", "public/css")
    .sass("resources/sass/regist_conf.scss", "public/css")
    .sass("resources/sass/regist_comp.scss", "public/css")
    .sass("resources/sass/user.scss", "public/css")
    .sass("resources/sass/modify.scss", "public/css")
    mix.sass("resources/sass/history.scss", "public/css")
    .sass("resources/sass/loafer.scss", "public/css")
    .sass("resources/sass/search.scss", "public/css")
    .sass("resources/sass/payment_conf.scss", "public/css")
    .sass("resources/sass/payment_comp.scss", "public/css")
    .sass("resources/sass/product_list.scss", "public/css")
    .sass("resources/sass/single_product.scss", "public/css")
    .sass("resources/sass/ship_modify.scss", "public/css")
    .options({
        processCssUrls: false
       });;
