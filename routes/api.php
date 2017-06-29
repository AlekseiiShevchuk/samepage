<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('backgrounds', 'BackgroundsController');

        Route::resource('images', 'ImagesController');

        Route::resource('scenarios', 'ScenariosController');

        //Route::resource('players', 'PlayersController');

        Route::get('profile', 'PlayersController@show');
        Route::put('profile', 'PlayersController@update');
        Route::get('profile/game_results', 'PlayersController@showResults');
        Route::get('profile/game_results/game/{id}', 'PlayersController@showResultsByGame');
        Route::get('profile/{player}/game_results/game/{game}', 'PlayersController@showResultsByGameAndPlayer');
        Route::get('profile/owned_games', 'PlayersController@showOwnedGames');

        Route::resource('games', 'GamesController');
        Route::get('games/{id}/game_results', 'GamesController@getAllResultsForTheGame');
        Route::get('games/{id}/join', 'GamesController@join');
        Route::get('games/{id}/activity', 'GamesController@activity');
        Route::get('games/{id}/start', 'GamesController@start');

        Route::resource('results', 'ResultsController');

        Route::resource('game_results', 'GameResultsController');

        Route::get('languages', 'LanguagesController@index');

});
