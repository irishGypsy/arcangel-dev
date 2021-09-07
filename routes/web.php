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

Route::get('/', 'App\Http\Controllers\Admin\BannerController@display')->name('site.app');

Route::get('/about',function() {
    return view('site.pages.about');
});

Route::get('/test', 'App\Http\Controllers\Admin\BannerController@display')->name('site.test');

Route::get('/batteryfinders/getmakes', 'App\Http\Controllers\Admin\BatteryFinderController@listMakes');
Route::get('/batteryfinders/getmodels/{make}', 'App\Http\Controllers\Admin\BatteryFinderController@listModels');
Route::get('/batteryfinders/getyears/{make}/{model}', 'App\Http\Controllers\Admin\BatteryFinderController@listYears');
Route::get('/batteryfinders/getengines/{make}/{model}/{year}', 'App\Http\Controllers\Admin\BatteryFinderController@listEngines');
Route::get('/batteryfinders/getbatterygroup/{make}/{model}/{year}/{engine}', 'App\Http\Controllers\Admin\BatteryFinderController@getBatteryGroup')->name('site.batteryfinder.search');
Route::get('/batteryfinders', 'App\Http\Controllers\Admin\BatteryFinderController@getBatteryGroup2')->name('site.batteryfinder.products');

Route::get('/technical_comparisons',function() {
    return view('site.pages.technical_comparisons');
});

Route::get('/faq',function() {
    return view('site.pages.faq');
});

Route::get('/contact_us',function() {
    return view('site.pages.contact_us');
});

Route::get('/returns_policy', function () {
    return view('site.pages.returns_policy');
});

Route::get('/terms_and_conditions', function () {
    return view('terms_and_conditions');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/affiliate_login', function () {
    return view('affiliate_login');
});

Route::get('slider', [SliderController::class, 'index']);

Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');

Route::get('/products', 'App\Http\Controllers\Site\ProductController@list')->name('products.list');

Route::get('/product/{id}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'App\Http\Controllers\Site\ProductController@addToCart')->name('product.add.cart');

Route::get('/cart', 'App\Http\Controllers\Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'App\Http\Controllers\Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'App\Http\Controllers\Site\CartController@clearCart')->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.place.order');
});

Route::get('checkout/payment/complete', 'App\Http\Controllers\Site\CheckoutController@complete')->name('checkout.payment.complete');

Route::get('account/orders', 'App\Http\Controllers\Site\AccountController@getOrders')->name('account.orders');

Route::get('paypaltest', function(){  return view('products.welcome');});
Route::get('payment', 'App\Http\Controllers\PayPalController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PayPalController@success')->name('payment.success');

Auth::routes();
require 'admin.php';
