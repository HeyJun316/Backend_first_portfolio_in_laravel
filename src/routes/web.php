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


Route::prefix('auth')->middleware('guest')->group(function () {


    Route::get('/{provider}', 'Auth\OAuthController@socialOAuth')
        ->where('provider', 'google')
        ->name('socialOAuth');

    Route::get('/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')
        ->where('provider', 'google')
        ->name('oauthCallback');
});



// MEMBER regist~history
Route::get('/home/member/regist', 'shoesController@regist');

Route::post('/home/member/regist_conf', 'shoesController@regist_conf')->name('regist_conf');

Route::get('/home/member/regist_comp', 'shoesController@regist_comp');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('/home/member/user', 'shoesController@user');

//MODIFY
Route::get('/home/member/modify', 'shoesController@modify')->name('modify');
Route::get('/home/member/ship_modify', 'shoesController@ship_modify')->name('ship_modify');

Route::post('/home/member/regist_comp', 'shoesController@upload')->name('allupload');

Route::post('/home/member/ship_regist_comp', 'shoesController@upload')->name('shipupload');

//PASSWORD_CHANGING
Route::get('/home/member/password_modify', 'shoesController@pass_modify')->name('password_modify');
Route::post('/home/member/pass_regist_comp', 'shoesController@pass_change')->name('password_change');

// Route::post('/home/member/password_modify', 'shoesController@pass_modify');


Route::get('/home/member/delete_conf', 'shoesController@delete_conf');
Route::post('/home/member/delete_comp', 'shoesController@delete_comp')->name('delete');

Route::get('/home/member/history', 'shoesController@history')->name('history')->middleware('auth');



//OK category gonna create cate's html of loafer/monkstrap...
// Route::get('/home/items/category/loafer','shoesController@loafer');
//serch
Route::get('/home/items/search/search', 'shoesController@search');

Route::get('/home/cart/payment_conf', 'shoesController@payment_conf')->name('payment_conf');



//LOGIN
Route::get('/home/member/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/home/member/login', 'Auth\LoginController@login'); //ていぎするzo!

//LOGOUT
Route::post("/home/member/logout", 'Auth\LoginController@logout')->name('logout');



//STRIPE
Route::post('/charge', 'ChargeController@charge');

//CONTACT FORM
Route::get('home/contact/contact', 'ContactController@contact')->name('contact.contact');
Route::post('home/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
Route::post('home/contact/thanks', 'ContactController@send')->name('contact.send');

//SIN_PRODUCT
Route::get('/home/items/single_product/{id}', 'shoesController@single_product')->name('single_product');

//PRODUCT_LIST
Route::get('/home/items/product_list/{id}', 'shoesController@product_list')->name('product_list');
Route::get('/home/items/product_list', 'shoesController@new')->name('new');


//HOME
Route::get('/home', 'shoesController@home');

//CART
Route::get('/home/cart/cart/', 'shoesController@cart')->name('cart');
Route::post('/home/cart/cart/', 'cartController@addMyCart');
Route::post('/cartdelete', 'cartController@cartDelete')->name('cartdelete');
