<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('players', 'PlayersController');

        Route::resource('backgrounds', 'BackgroundsController');

        Route::resource('scenarios', 'ScenariosController');

        Route::resource('images', 'ImagesController');

        Route::resource('games', 'GamesController');

        Route::resource('game_results', 'GameResultsController');

});
