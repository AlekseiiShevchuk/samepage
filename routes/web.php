<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('backgrounds', 'BackgroundsController');
    Route::post('backgrounds_mass_destroy', ['uses' => 'BackgroundsController@massDestroy', 'as' => 'backgrounds.mass_destroy']);
    Route::resource('images', 'ImagesController');
    Route::post('images_mass_destroy', ['uses' => 'ImagesController@massDestroy', 'as' => 'images.mass_destroy']);

    Route::resource('scenarios', 'ScenariosController');
    Route::post('scenarios_mass_destroy', ['uses' => 'ScenariosController@massDestroy', 'as' => 'scenarios.mass_destroy']);
    Route::get('scenarios/{id}/sort-images', ['uses' => 'ScenariosController@sortImages', 'as' => 'scenarios.sortImages']);

    Route::resource('players', 'PlayersController');
    Route::post('players_mass_destroy', ['uses' => 'PlayersController@massDestroy', 'as' => 'players.mass_destroy']);
    Route::resource('games', 'GamesController');
    Route::post('games_mass_destroy', ['uses' => 'GamesController@massDestroy', 'as' => 'games.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
    Route::resource('game_results', 'GameResultsController');
    Route::post('game_results_mass_destroy', ['uses' => 'GameResultsController@massDestroy', 'as' => 'game_results.mass_destroy']);

    Route::resource('sections', 'SectionsController');
    Route::post('sections_mass_destroy', ['uses' => 'SectionsController@massDestroy', 'as' => 'sections.mass_destroy']);


    Route::resource('languages', 'LanguagesController');
    Route::post('languages_mass_destroy',
        ['uses' => 'LanguagesController@massDestroy', 'as' => 'languages.mass_destroy']);

    Route::resource('translation_items', 'TranslationItemsController');
    Route::post('translation_items_mass_destroy',
        ['uses' => 'TranslationItemsController@massDestroy', 'as' => 'translation_items.mass_destroy']);
    Route::put('translation_items_mass_update',
        ['uses' => 'TranslationItemsController@massUpdate'])->name('translation_items.mass_update');

    Route::post('/excel-import', 'TranslationItemsController@importExcel');

    Route::get('/excel-export/{type}', 'TranslationItemsController@exportExcel');

});
