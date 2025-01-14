<?php

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

Route::group(['middleware' => 'admin'], function () {
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/admin/dashboard', 'AdminController@index');
        Route::resource('/admin/products', 'Admin\ProductsController');
        Route::resource('/admin/categories', 'Admin\CategoryController', [
            'except' => ['destroy'],
        ]);
        Route::post('/admin/categories/{id}', 'Admin\CategoryController@destroy')->name('categories.destroy');
    });

    Route::get('/admin/login', 'AdminController@login')->name('admin.login');
    Route::post('/admin/login', 'AdminController@postLogin');
    Route::get('admin/logout', 'AdminController@logout');
});


Auth::routes();


Route::post('/add-to-wishlist', 'LandingPageController@addWishList')->name('addToWishList')->middleware('auth');
Route::get('/wishlist', 'LandingPageController@View_wishList')->middleware('auth')->name('wishlist');
Route::get('/remove-wishlist/{id}', 'LandingPageController@removeWishList')->middleware('auth');
Route::get('/orders', 'ProfileController@orders')->middleware('auth');
Route::get('/profile/address', 'ProfileController@address')->middleware('auth')->name('profile.address');


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', 'LandingPageController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cartAdd', 'CartController@addToCart')->name('cart.addToCart');
//Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::put('/cart/update/{id}', 'CartController@update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::get('/faturaProforma', 'CartController@faturaProforma');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToSaveForLater/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
Route::get('/references', 'SaveForLaterController@index')->name('references.index');
Route::post('/references/create', 'SaveForLaterController@create')->name('references.create');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');



Route::get('/register_address', 'AddressController@index')->name('register_address.index')->middleware('auth');
Route::post('/form-validate', 'AddressController@address')->name('formValidate.address')->middleware('auth');
Route::get('/address', 'AddressController@viewAddress')->name('address.viewAddress')->middleware('auth');
Route::get('/address-edit/{id}', 'AddressController@editAddress')->name('address.edit')->middleware('auth');
Route::post('/address-update/{id}', 'AddressController@UpdateAddress')->name('address.update')->middleware('auth');
Route::get('/send', 'AddressController@addSend')->name('send.addSend')->middleware('auth');
Route::post('/form-send', 'AddressController@productSend')->name('formSend.productSend');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/resumo', 'CheckoutController@create')->name('resumo.create');
Route::get('/payment', 'CheckoutController@referencia')->name('payment.referencia');
Route::get('/finish', 'CheckoutController@viewReferences')->name('finish.viewReferences');
Route::post('/thankyou', 'ConfirmationController@store')->name('thankyou.index');

Route::get('empty', function () {
    Cart::instance('saveForLater')->destroy();
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});








//Route::get('/home', 'HomeController@index')->name('home');
