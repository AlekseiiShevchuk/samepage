<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;

class GamesController extends Controller
{
    public function index()
    {
        return Game::all();
    }

    public function show($id)
    {
        return Game::findOrFail($id)->load([
            'scenario',
            'scenario.images',
            'scenario.background',
            'owner',
            'owner_etalon_result',
            'owner_etalon_result.results'
        ]);
    }

    public function update(UpdateGamesRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());

        return $game;
    }

    public function store(StoreGamesRequest $request)
    {
        $game = Game::create($request->all());

        return $game;
    }

//    public function destroy($id)
//    {
//        $game = Game::findOrFail($id);
//        $game->delete();
//        return '';
//    }

    public function getAllResultsForTheGame($id)
    {
        return GameResult::where('for_game_id', $id)->orderBy('created_at','DESC')->with(['by_player','results'])->paginate();
    }
}
