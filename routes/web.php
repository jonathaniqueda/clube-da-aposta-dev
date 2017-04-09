<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::match(['get', 'post'], '/', 'LoginController@index')->name('login_index');
    Route::get('/sair', 'LoginController@logout')->name('login_logout');
    Route::match(['get', 'post'], '/cadastrar', 'RegisterController@index')->name('login_create');
    Route::match(['get', 'post'], '/cadastrar/senha', 'RegisterController@createPassword')->name('login_create_pass');

    Route::group(['prefix' => 'social/facebook'], function () {
        Route::get('/', 'RegisterController@redirectToProvider')->name('login_facebook');
        Route::get('autorizado', 'RegisterController@handleProviderCallback')->name('login_autorizado_fb');
    });
});

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@home')->name('dashboard_index');

    Route::group(['prefix' => 'campeonato'], function () {
        Route::get('/', 'ChampionshipController@index')->name('championship_index');
        Route::match(['get', 'post'], '/cadastrar', 'ChampionshipController@create')->name('championship_create');
        Route::match(['get', 'post'], '/rank', 'ChampionshipController@rank')->name('championship_rank');
    });

    Route::group(['prefix' => 'times'], function () {
        Route::get('/', 'TeamsController@index')->name('teams_index');
        Route::match(['get', 'post'], '/cadastrar', 'TeamsController@create')->name('teams_create');
    });

    Route::group(['prefix' => 'jogos'], function () {
        Route::get('/', 'MatchesController@index')->name('matches_index');
        Route::match(['get', 'post'], '/cadastrar', 'MatchesController@create')->name('matches_create');
    });

});