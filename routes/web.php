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


Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', 'AdminController@index');
        Route::resource('/products', 'Admin\ProductController');
        Route::resource('/categories', 'Admin\CategoryController');
        Route::resource('/bank-accounts', 'Admin\BankAccountController');
        Route::resource('/orders', 'Admin\OrderController');
        Route::put('/orders/{id}/send', 'Admin\OrderController@send')->name('orders.send');
        Route::put('/orders/{id}/delivery', 'Admin\OrderController@delivery')->name('orders.delivery');
        Route::resource('/payments', 'Admin\PaymentController');
        Route::put('/payments/{id}/confirm', 'Admin\PaymentController@confirm')->name('payments.confirm');
        Route::put('/payments/{id}/cancel', 'Admin\PaymentController@cancel')->name('payments.cancel');
        Route::put('/payments/{id}/refund', 'Admin\PaymentController@refund')->name('payments.refund');
        Route::resource('/suppliers', 'Admin\SupplierController');
    });
    Route::get('/login', 'AdminController@login')->name('login');
    Route::post('/login', 'AdminController@postLogin')->name('postLogin');
    Route::get('/logout', 'AdminController@logout')->name('logout');
});

Auth::routes();

Route::post('/add-to-wishlist', 'LandingPageController@addWishlist')->name('addToWishlist')->middleware('auth');
Route::get('/wishlist', 'LandingPageController@View_wishList')->middleware('auth')->name('wishlist');
Route::post('/remove-wishlist/{id}', 'LandingPageController@removeWishlist')->middleware('auth')->name('removeWishlist');
Route::group(['middleware' => ['auth'], 'prefix' => "orders"], function () {
    Route::get('/', 'OrderController@index')->name('orders.index');
    Route::get('/{order}', 'OrderController@show')->name('orders.show');
});

Route::group(['middleware' => ['auth'], 'prefix' => "payments"], function () {
    Route::post('/{id}/add-receipt', 'PaymentController@addReceipt')->name('payments.addReceipt');
});

Route::get('/profile/address', 'ProfileController@address')->middleware('auth')->name('profile.address');


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', 'LandingPageController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cart-add', 'CartController@addToCart')->name('cart.addToCart');
//Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::put('/cart/update/{id}', 'CartController@update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switch-to-save-for-later/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::get('/fatura-proforma', 'CartController@faturaProforma')->name('faturaProforma');

Route::delete('/save-for-later/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/save-for-later/switch-to-save-for-later/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
Route::get('/references', 'SaveForLaterController@index')->name('references.index');
Route::post('/references/create', 'SaveForLaterController@create')->name('references.create');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/register-address', 'AddressController@index')->name('registerAddress.index')->middleware('auth');
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
Route::get('/finish/{order_id}', 'CheckoutController@viewReferences')->name('finish.viewReferences');
Route::post('/thankyou', 'ConfirmationController@store')->name('thankyou.index');

Route::get('empty', function () {
    Cart::instance('saveForLater')->destroy();
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

//Route::get('/home', 'HomeController@index')->name('home');
