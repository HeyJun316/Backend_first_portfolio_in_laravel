<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/member/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get(
    '/member/login/google/callback',
    'Auth\LoginController@handleGoogleCallback',
);

Route::get('/member/login', 'Auth\LoginController@showLoginForm')->name(
    'login',
);
Route::post('/member/login', 'Auth\LoginController@login');
//LOGOUT
Route::post('/member/logout', 'Auth\LoginController@logout')->name('logout');

// REGITS
Route::get('/member/regist', 'shoesController@regist');
Route::post('/member/regist_conf', 'shoesController@regist_conf')->name(
    'regist_conf',
);
Route::get('/member/regist_comp', 'shoesController@regist_comp');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name(
    'register',
);
Route::post('register', 'Auth\RegisterController@register');

Route::get('/member/user', 'shoesController@user');
//MODIFY
Route::get('/member/modify', 'shoesController@modify')->name('modify');
Route::get('/member/ship_modify', 'shoesController@ship_modify')->name(
    'ship_modify',
);
Route::get('/member/password_modify', 'shoesController@pass_modify')->name(
    'password_modify',
);
// Route::post('/member/password_modify', 'shoesController@pass_modify');

Route::post('/member/pass_regist_comp', 'shoesController@pass_change')->name(
    'password_change',
);

Route::post('/member/regist_comp', 'shoesController@upload')->name('allupload');

Route::post('/member/ship_regist_comp', 'shoesController@upload')->name(
    'shipupload',
);

//DELETE
Route::get('/member/delete_conf', 'shoesController@delete_conf');
Route::post('/member/delete_comp', 'shoesController@delete_comp')->name(
    'delete',
);

Route::get('/member/history', 'shoesController@history')
    ->name('history')
    ->middleware('auth');

Route::get('/items/search/search', 'shoesController@search');

//STRIPE
Route::post('/charge', 'ChargeController@charge');

//CONTACT FORM
Route::get('/contact/contact', 'ContactController@contact')->name(
    'contact.contact',
);
Route::post('/contact/confirm', 'ContactController@confirm')->name(
    'contact.confirm',
);
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');

//SIN_PRODUCT
Route::get(
    '/items/single_product/{id}',
    'shoesController@single_product',
)->name('single_product');

//PRODUCT_LIST
Route::get('/items/product_list/{id}', 'shoesController@product_list')->name(
    'product_list',
);

Route::get('/items/product_list', 'shoesController@new')->name('new');

Route::get('/items/cheaper_product_list', 'shoesController@cheap')->name(
    'cheap',
);
Route::get('/items/pricier_product_list', 'shoesController@pricy')->name(
    'pricy',
);

//HOME
Route::get('/', 'shoesController@home');

//CART
Route::get('/cart/cart/', 'shoesController@cart')->name('cart');
Route::post('/cart/cart/', 'cartController@addMyCart');

Route::post('/cartdelete', 'cartController@cartDelete')->name('cartdelete');

Route::get('/cart/payment_conf', 'shoesController@payment_conf')->name(
    'payment_conf',
);
