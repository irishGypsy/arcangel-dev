<?php

//use Illuminate\Support\Facades\Route;


Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

        Route::group(['middleware' => ['auth:admin']], function () {

            Route::get('/', function () {
                return view('admin.dashboard.index');
            })->name('admin.dashboard');

        });


    Route::get('/settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings');
    Route::post('/settings', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');

    Route::group(['prefix'  =>   'batterygroups'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\BatteryGroupController@index')->name('admin.batterygroups.index');
        Route::get('/create', 'App\Http\Controllers\Admin\BatteryGroupController@create')->name('admin.batterygroups.create');
        Route::post('/store', 'App\Http\Controllers\Admin\BatteryGroupController@store')->name('admin.batterygroups.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\BatteryGroupController@edit')->name('admin.batterygroups.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\BatteryGroupController@update')->name('admin.batterygroups.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\BatteryGroupController@delete')->name('admin.batterygroups.delete');

    });

    Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CategoryController@delete')->name('admin.categories.delete');

        });

    Route::group(['prefix'  =>   'banners'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\BannerController@index')->name('admin.banners.index');
        Route::get('/create', 'App\Http\Controllers\Admin\BannerController@create')->name('admin.banners.create');
        Route::post('/store', 'App\Http\Controllers\Admin\BannerController@store')->name('admin.banners.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\BannerController@edit')->name('admin.banners.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\BannerController@update')->name('admin.banners.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\BannerController@delete')->name('admin.banners.delete');

    });

    Route::group(['prefix'  =>   'capacities'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\CapacityController@index')->name('admin.capacities.index');
        Route::get('/create', 'App\Http\Controllers\Admin\CapacityController@create')->name('admin.capacities.create');
        Route::post('/store', 'App\Http\Controllers\Admin\CapacityController@store')->name('admin.capacities.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CapacityController@edit')->name('admin.capacities.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\CapacityController@update')->name('admin.capacities.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CapacityController@delete')->name('admin.capacities.delete');

    });

    Route::group(['prefix'  =>   'sales'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\SaleController@index')->name('admin.sales.index');
        Route::get('/create/{id}', 'App\Http\Controllers\Admin\SaleController@create')->name('admin.sales.create');
        Route::post('/store', 'App\Http\Controllers\Admin\SaleController@store')->name('admin.sales.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\SaleController@edit')->name('admin.sales.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\SaleController@update')->name('admin.sales.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\SaleController@delete')->name('admin.sales.delete');

    });

    Route::group(['prefix'  =>   'inventories'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\InventoryController@index')->name('admin.inventories.index');
        Route::get('/create', 'App\Http\Controllers\Admin\InventoryController@create')->name('admin.inventories.create');
        Route::post('/store', 'App\Http\Controllers\Admin\InventoryController@store')->name('admin.inventories.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\InventoryController@edit')->name('admin.inventories.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\InventoryController@update')->name('admin.inventories.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\InventoryController@delete')->name('admin.inventories.delete');

    });

    Route::group(['prefix'  =>   'testimonials'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\TestimonialController@index')->name('admin.testimonials.index');
        Route::get('/create', 'App\Http\Controllers\Admin\TestimonialController@create')->name('admin.testimonials.create');
        Route::post('/store', 'App\Http\Controllers\Admin\TestimonialController@store')->name('admin.testimonials.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\TestimonialController@edit')->name('admin.testimonials.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\TestimonialController@update')->name('admin.testimonials.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\TestimonialController@delete')->name('admin.testimonials.delete');

    });

    Route::group(['prefix'  =>   'faqs'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\FaqController@index')->name('admin.faqs.index');
        Route::get('/create', 'App\Http\Controllers\Admin\FaqController@create')->name('admin.faqs.create');
        Route::post('/store', 'App\Http\Controllers\Admin\FaqController@store')->name('admin.faqs.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\FaqController@edit')->name('admin.faqs.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\FaqController@update')->name('admin.faqs.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\FaqController@delete')->name('admin.faqs.delete');

    });

    Route::group(['prefix'  =>   'videos'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\VideoController@index')->name('admin.videos.index');
        Route::get('/create', 'App\Http\Controllers\Admin\VideoController@create')->name('admin.videos.create');
        Route::post('/store', 'App\Http\Controllers\Admin\VideoController@store')->name('admin.videos.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\VideoController@edit')->name('admin.videos.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\VideoController@update')->name('admin.videos.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\VideoController@delete')->name('admin.videos.delete');

    });

    Route::group(['prefix'  =>   'productreviews'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\ProductReviewController@index')->name('admin.productreviews.index');
        Route::get('/list/{id}', 'App\Http\Controllers\Admin\ProductReviewController@getReviewsByProductId')->name('admin.productreviews.index');
        Route::get('/create', 'App\Http\Controllers\Admin\ProductReviewController@create')->name('admin.productreviews.create');
        Route::post('/store', 'App\Http\Controllers\Admin\ProductReviewController@store')->name('admin.productreviews.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ProductReviewController@edit')->name('admin.productreviews.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\ProductReviewController@update')->name('admin.productreviews.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\ProductReviewController@delete')->name('admin.productreviews.delete');

    });

    Route::group(['prefix'  =>   'referrals'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\ReferralController@index')->name('admin.referrals.index');
//        Route::get('/create', 'App\Http\Controllers\Admin\ReferralController@create')->name('admin.referrals.create');
//        Route::post('/store', 'App\Http\Controllers\Admin\ReferralController@store')->name('admin.referrals.store');
//        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReferralController@edit')->name('admin.referrals.edit');
//        Route::post('/update', 'App\Http\Controllers\Admin\ReferralController@update')->name('admin.referrals.update');
//        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\ReferralController@delete')->name('admin.referrals.delete');

    });

    Route::group(['prefix'  =>   'affiliates'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\AffiliateController@index')->name('admin.affiliates.index');
        Route::get('/create', 'App\Http\Controllers\Admin\AffiliateController@create')->name('admin.affiliates.create');
        Route::post('/store', 'App\Http\Controllers\Admin\AffiliateController@store')->name('admin.affiliates.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\AffiliateController@edit')->name('admin.affiliates.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\AffiliateController@update')->name('admin.affiliates.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\AffiliateController@delete')->name('admin.affiliates.delete');

    });

    Route::group(['prefix'  =>   'users'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\UserController@index')->name('admin.users.index');
        Route::get('/create', 'App\Http\Controllers\Admin\UserController@create')->name('admin.users.create');
        Route::post('/store', 'App\Http\Controllers\Admin\UserController@store')->name('admin.users.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\UserController@edit')->name('admin.users.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\UserController@update')->name('admin.users.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\UserController@delete')->name('admin.users.delete');

    });

    Route::group(['prefix'  =>   'coupons'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\CouponController@index')->name('admin.coupons.index');
        Route::get('/create', 'App\Http\Controllers\Admin\CouponController@create')->name('admin.coupons.create');
        Route::post('/store', 'App\Http\Controllers\Admin\CouponController@store')->name('admin.coupons.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CouponController@edit')->name('admin.coupons.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\CouponController@update')->name('admin.coupons.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CouponController@delete')->name('admin.coupons.delete');

    });

    Route::group(['prefix'  =>   'returnproducts'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\ReturnProductController@index')->name('admin.returnproducts.index');
        Route::get('/create', 'App\Http\Controllers\Admin\ReturnProductController@create')->name('admin.returnproducts.create');
        Route::post('/store', 'App\Http\Controllers\Admin\ReturnProductController@store')->name('admin.returnproducts.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReturnProductController@edit')->name('admin.returnproducts.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\ReturnProductController@update')->name('admin.returnproducts.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\ReturnProductController@delete')->name('admin.returnproducts.delete');

    });

    Route::group(['prefix'  =>   'batteryfinders'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\BatteryFinderController@index')->name('admin.batteryfinders.index');
        Route::get('/create', 'App\Http\Controllers\Admin\BatteryFinderController@create')->name('admin.batteryfinders.create');
        Route::post('/store', 'App\Http\Controllers\Admin\BatteryFinderController@store')->name('admin.batteryfinders.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\BatteryFinderController@edit')->name('admin.batteryfinders.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\BatteryFinderController@update')->name('admin.batteryfinders.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\BatteryFinderController@delete')->name('admin.batteryfinders.delete');

    });

    Route::group(['prefix'  =>   'posts'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\PostController@index')->name('admin.posts.index');
        Route::get('/create', 'App\Http\Controllers\Admin\PostController@create')->name('admin.posts.create');
        Route::post('/store', 'App\Http\Controllers\Admin\PostController@store')->name('admin.posts.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\PostController@edit')->name('admin.posts.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\PostController@update')->name('admin.posts.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\PostController@delete')->name('admin.posts.delete');

    });

    Route::group(['prefix'  =>   'products'], function () {

        Route::get('/', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.products.index');
        Route::get('/create', 'App\Http\Controllers\Admin\ProductController@create')->name('admin.products.create');
        Route::post('/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.products.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin.products.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.products.update');
        Route::post('images/upload', 'App\Http\Controllers\Admin\ProductImageController@upload')->name('admin.products.images.upload');
        Route::get('images/{id}/delete', 'App\Http\Controllers\Admin\ProductImageController@delete')->name('admin.products.images.delete');
        Route::get('/popular/{id}', 'App\Http\Controllers\Admin\ProductController@flipPopular')->name('admin.products.flippopular');
    });

    Route::group(['prefix'  =>   'productshippinginfos'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\ProductShippingInfoController@index')->name('admin.productshippinginfos.index');
        Route::get('/create', 'App\Http\Controllers\Admin\ProductShippingInfoController@create')->name('admin.productshippinginfos.create');
        Route::post('/store', 'App\Http\Controllers\Admin\ProductShippingInfoController@store')->name('admin.productshippinginfos.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ProductShippingInfoController@edit')->name('admin.productshippinginfos.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\ProductShippingInfoController@update')->name('admin.productshippinginfos.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\ProductShippingInfoController@delete')->name('admin.productshippinginfos.delete');

    });

    Route::group(['prefix'  =>   'attributes'], function() {

        Route::get('/', 'App\Http\Controllers\Admin\AttributeController@index')->name('admin.attributes.index');
        Route::get('/create', 'App\Http\Controllers\Admin\AttributeController@create')->name('admin.attributes.create');
        Route::post('/store', 'App\Http\Controllers\Admin\AttributeController@store')->name('admin.attributes.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\AttributeController@edit')->name('admin.attributes.edit');
        Route::post('/update', 'App\Http\Controllers\Admin\AttributeController@update')->name('admin.attributes.update');
        Route::get('/{id}/delete', 'App\Http\Controllers\Admin\AttributeController@delete')->name('admin.attributes.delete');

    });

    Route::post('/get-values', 'App\Http\Controllers\Admin\AttributeValueController@getValues');
    Route::post('/add-values', 'App\Http\Controllers\Admin\AttributeValueController@addValues');
    Route::post('/update-values', 'App\Http\Controllers\Admin\AttributeValueController@updateValues');
    Route::post('/delete-values', 'App\Http\Controllers\Admin\AttributeValueController@deleteValues');
    // Load attributes on the page load
    Route::get('attributes/load', 'App\Http\Controllers\Admin\ProductAttributeController@loadAttributes');
    // Load product attributes on the page load
    Route::post('attributes', 'App\Http\Controllers\Admin\ProductAttributeController@productAttributes');
    // Load option values for a attribute
    Route::post('attributes/values', 'App\Http\Controllers\Admin\ProductAttributeController@loadValues');
    // Add product attribute to the current product
    Route::post('attributes/add', 'App\Http\Controllers\Admin\ProductAttributeController@addAttribute');
    // Delete product attribute from the current product
    Route::post('attributes/delete', 'App\Http\Controllers\Admin\ProductAttributeController@deleteAttribute');

    Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\OrderController@index')->name('admin.orders.index');
    Route::get('/{order}/show', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.orders.show');
});

});
