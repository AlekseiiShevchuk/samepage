<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('backgrounds', 'BackgroundsController');

        Route::resource('images', 'ImagesController');

        Route::resource('scenarios', 'ScenariosController');

        Route::resource('players', 'PlayersController');

        Route::resource('results', 'ResultsController');

});
