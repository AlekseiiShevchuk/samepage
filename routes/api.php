<?php
Route::post('scenarios/{scenario}/sort-images','ScenariosController@saveImageSorting')->name('scenarios.saveImageSorting');

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('backgrounds', 'BackgroundsController');

        Route::resource('images', 'ImagesController');

        Route::resource('scenarios', 'ScenariosController');

        //Route::resource('players', 'PlayersController');

        Route::get('profile', 'PlayersController@show');
        Route::put('profile', 'PlayersController@update');
        Route::get('profile/game_results', 'PlayersController@showResults');
        Route::get('profile/game_results/game/{id}', 'PlayersController@showResultsByGame');
        Route::get('profile/owned_games', 'PlayersController@showOwnedGames');

        Route::resource('games', 'GamesController');
        Route::get('games/{id}/game_results', 'GamesController@getAllResultsForTheGame');
        Route::get('games/{id}/join', 'GamesController@join');

        Route::resource('results', 'ResultsController');

        Route::resource('game_results', 'GameResultsController');

});
