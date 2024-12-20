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

Route::group(['middleware' => 'admin'], function(){
	Route::group(['middleware' => 'auth:admin'], function(){
		Route::get('/admin/londing', 'AdminController@index');
		Route::resource('/admin/products', 'Admin\ProductsController');
		Route::resource('/admin/categories', 'Admin\CategoryController');

	});
	
	Route::get('/admin/login', 'AdminController@login');
	Route::post('/admin/login', 'AdminController@postLogin');
	Route::get('admin/logout', 'AdminController@logout');
});


Auth::routes();


	Route::post('/addToWishList', 'LandingPageController@addWishList')->name('addToWishList')->middleware('auth');
	Route::get('/wishList', 'LandingPageController@View_wishList')->middleware('auth');
	Route::get('/removeWishList/{id}', 'LandingPageController@removeWishList')->middleware('auth');
	Route::get('/orders', 'ProfileController@orders')->middleware('auth');
	Route::get('/addres', 'ProfileController@address')->middleware('auth');


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
Route::put('/cart/update/{id}','CartController@update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::get('/faturaProforma', 'CartController@faturaProforma');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToSaveForLater/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
Route::get('/references', 'SaveForLaterController@index')->name('references.index');
Route::post('/references/create', 'SaveForLaterController@create')->name('references.create');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');



Route::get('/register_adress', 'AdressController@index')->name('register_adress.index')->middleware('auth');
Route::post('/formvalidate','AdressController@address')->name('formvalidate.address')->middleware('auth');
Route::get('/address', 'AdressController@viewAddress')->name('address.viewAddress')->middleware('auth');
Route::get('/addressEdit/{id}', 'AdressController@editAdress')->name('address.edit')->middleware('auth');
Route::post('/addressUpdate/{id}', 'AdressController@UpdateAdress')->name('address.update')->middleware('auth');
Route::get('/send', 'AdressController@addSend')->name('send.addSend')->middleware('auth');
Route::post('/formsend', 'AdressController@productSend')->name('formsend.productSend');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/resumo', 'CheckoutController@create')->name('resumo.create');
Route::get('/paymant','CheckoutController@referencia')->name('paymant.referencia');
Route::get('/finish','CheckoutController@viewReferences')->name('finish.viewReferences');
Route::post('/thankyou', 'ConfirmationController@store')->name('thankyou.index');

Route::get('empty', function(){
	Cart::instance('saveForLater')->destroy();
});

Route::get('/clear-cache', function(){
	Artisan::call('cache:clear');
	return "Cache is cleared";
});








//Route::get('/home', 'HomeController@index')->name('home');
