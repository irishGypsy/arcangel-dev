<?php

//use Illuminate\Support\Facades\Route;


Route::group(['prefix'  =>  'affiliate'], function () {

    Route::get('login', 'App\Http\Controllers\Affiliates\LoginController@showLoginForm')->name('affiliate.login');
    Route::post('login', 'App\Http\Controllers\Affiliates\LoginController@login')->name('affiliate.login.post');
//    Route::post('register', '\App\Http\Controllers\Affiliates\AffilliateRegisterController@create')->name('affiliate.register');
    Route::get('logout', 'App\Http\Controllers\Affiliates\LoginController@logout')->name('affiliate.logout');

    Route::get('/', function () {
        return view('affiliate.dashboard.index');
    });

});
