<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api'], function () {
    Route::get('search', 'SearchController@find')->name('elastic_search');
    Route::get('search-teams-by-champs/{champsId}', 'SearchController@getTeamsByChamp')->name('get_team_by_champs');
});
