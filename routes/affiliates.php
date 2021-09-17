<?php

//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Affiliates\AffiliateDashboardController;

Route::group(['prefix'  =>  'affiliate'], function () {

    Route::get('login', 'App\Http\Controllers\Affiliates\LoginController@showLoginForm')->name('affiliate.login');
    Route::post('login', 'App\Http\Controllers\Affiliates\LoginController@login')->name('affiliate.login.post');
    Route::get('signup', '\App\Http\Controllers\Affiliates\RegisterController@signup')->name('affiliate.signup');
    Route::post('register', '\App\Http\Controllers\Affiliates\RegisterController@create')->name('affiliate.register');
    Route::get('logout', 'App\Http\Controllers\Affiliates\LoginController@logout')->name('affiliate.logout');

    Route::group(['middleware' => ['auth:affiliate']], function () {

        Route::get('/', 'App\Http\Controllers\Affiliates\AffiliateDashboardController@getDashboard')->name('affiliate.dashboard');
        Route::post('updateProfile', 'App\Http\Controllers\Affiliates\AffiliateDashboardController@updateProfile')->name('affiliate.updateprofile');
        Route::post('updateBank','App\Http\Controllers\Affiliates\AffiliateDashboardController@updateProfile')->name('affiliate.updatebank');
        Route::post('changePassword','App\Http\Controllers\Affiliates\AffiliateDashboardController@updatePass')->name('affiliate.updatepass');

    });
});
