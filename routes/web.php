<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

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

Route::get('/', 'App\Http\Controllers\Site\WelcomeController@display')->name('site.app');

Route::group(['prefix' => 'batteryfinders'], function(){
    Route::get('/getmakes', 'App\Http\Controllers\Admin\BatteryFinderController@listMakes');
    Route::get('/getmodels/{make}', 'App\Http\Controllers\Admin\BatteryFinderController@listModels');
    Route::get('/getyears/{make}/{model}', 'App\Http\Controllers\Admin\BatteryFinderController@listYears');
    Route::get('/getengines/{make}/{model}/{year}', 'App\Http\Controllers\Admin\BatteryFinderController@listEngines');
    Route::get('/getbatterygroup/{make}/{model}/{year}/{engine}', 'App\Http\Controllers\Admin\BatteryFinderController@getBatteryGroup')->name('site.batteryfinder.search');
    Route::get('/', 'App\Http\Controllers\Admin\BatteryFinderController@getBatteryGroup2')->name('site.batteryfinder.products');

});

Route::get('/wishlist','App\Http\Controllers\Site\WelcomeController@getWishlists')->name('site.wishlist');

Route::get('/video','App\Http\Controllers\Site\WelcomeController@getVideos')->name('site.video');

Route::get('/contact_us',function() { return view('site.pages.contact_us'); })->name('site.contact');

Route::get('/profile', 'App\Http\Controllers\Site\ProfileController@getDashboard')->name('site.profile');
Route::post('/profile/updateuser', 'App\Http\Controllers\Site\ProfileController@updateUser')->name('site.profile.updateprofile');

Route::group(['prefix' => 'addresses'],function(){
    Route::post('/', 'App\Http\Controllers\Site\AddressController@index')->name('site.addresses.index');
    Route::post('/update', 'App\Http\Controllers\Site\AddressController@update')->name('site.addresses.update');
    Route::post('/create', 'App\Http\Controllers\Site\AddressController@store')->name('site.addresses.create');
    Route::post('/{id}/edit', 'App\Http\Controllers\Site\AddressController@edit')->name('site.addresses.edit');
    Route::post('/store', 'App\Http\Controllers\Site\AddressController@store')->name('site.addresses.store');
    Route::post('/delete', 'App\Http\Controllers\Site\AddressController@delete')->name('site.addresses.delete');

});

Route::get('/faq','App\Http\Controllers\Site\WelcomeController@getFaqs')->name('site.faq');

Route::group(['prefix'  =>   'wishlists'], function() {
    Route::get('/', 'App\Http\Controllers\Site\WishlistController@index')->name('site.wishlists.index');
    Route::get('/create', 'App\Http\Controllers\Site\WishlistController@create')->name('site.wishlists.create');
    Route::post('/store', 'App\Http\Controllers\Site\WishlistController@store')->name('site.wishlists.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\Site\WishlistController@edit')->name('site.wishlists.edit');
    Route::post('/update', 'App\Http\Controllers\Site\WishlistController@update')->name('site.wishlists.update');
    Route::get('/{id}/delete', 'App\Http\Controllers\Site\WishlistController@delete')->name('site.wishlists.delete');

});

Route::get('post/{id}', 'App\Http\Controllers\Site\WelcomeController@getPage')->name('post.page');

Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');

Route::get('/products', 'App\Http\Controllers\Site\ProductController@list')->name('products.list');

Route::get('/product/{id}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'App\Http\Controllers\Site\ProductController@addToCart')->name('product.add.cart');

Route::group(['prefix' => 'cart'], function(){
    Route::get('/', 'App\Http\Controllers\Site\CartController@getCart')->name('checkout.cart');
    Route::get('/item/{id}/remove', 'App\Http\Controllers\Site\CartController@removeItem')->name('checkout.cart.remove');
    Route::get('/clear', 'App\Http\Controllers\Site\CartController@clearCart')->name('checkout.cart.clear');
    Route::post('/applycouponcode', 'App\Http\Controllers\Site\CartController@applyCouponCode')->name('checkout.cart.applycouponcode');
    Route::get('/addQty/{id}', 'App\Http\Controllers\Site\CartController@addQty')->name('checkout.cart.addQty');
    Route::get('/subtractQty{id}', 'App\Http\Controllers\Site\CartController@subtractQty')->name('checkout.cart.subtractQty');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/revieworder', 'App\Http\Controllers\Site\CheckoutController@reviewOrder')->name('checkout.review.order');
    Route::post('/checkout/order', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.place.order');
});

Route::get('checkout/payment/complete', 'App\Http\Controllers\Site\CheckoutController@complete')->name('checkout.payment.complete');

Route::get('account/orders', 'App\Http\Controllers\Site\AccountController@getOrders')->name('account.orders');

Route::get('paypaltest', function(){  return view('products.welcome');});
Route::get('payment', 'App\Http\Controllers\PayPalController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PayPalController@success')->name('payment.success');

Route::get('/logout/x', 'App\Http\Controllers\Site\ProfileController@logout')->name('logout.x');

Auth::routes();
require 'admin.php';
//require 'affiliates.php';
