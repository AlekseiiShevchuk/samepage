<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('backgrounds', 'BackgroundsController');

        Route::resource('images', 'ImagesController');

        Route::resource('scenarios', 'ScenariosController');

        Route::resource('players', 'PlayersController');
        Route::get('players/{id}/game_results', 'PlayersController@showResults');
        Route::get('players/{id}/owned_games', 'PlayersController@showOwnedGames');

        Route::resource('games', 'GamesController');
        Route::get('games/{id}/game_results', 'GamesController@getAllResultsForTheGame');

        Route::resource('results', 'ResultsController');

        Route::resource('game_results', 'GameResultsController');

});
