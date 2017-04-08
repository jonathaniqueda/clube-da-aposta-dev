<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::match(['get', 'post'], '/', 'LoginController@index')->name('login_index');
    Route::match(['get', 'post'], '/cadastrar', 'RegisterController@index')->name('login_create');
    Route::match(['get', 'post'], '/cadastrar/senha', 'RegisterController@createPassword')->name('login_create_pass');

    Route::group(['prefix' => 'social/facebook'], function () {
        Route::get('/', 'RegisterController@redirectToProvider')->name('login_facebook');
        Route::get('autorizado', 'RegisterController@handleProviderCallback')->name('login_autorizado_fb');
    });
});

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@home')->name('dashboard_index');
});