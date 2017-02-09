<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;
use Illuminate\Support\Facades\Auth;

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
            'owner_etalon_result.results',
            'players',
        ]);
    }

    public function join($id)
    {
        $game = Game::findOrFail($id);
        $game->players()->syncWithoutDetaching([Auth::user()->id]);
        return $game->load([
            'scenario',
            'scenario.images',
            'scenario.background',
            'owner',
            'owner_etalon_result',
            'owner_etalon_result.results',
            'players',
        ]);
    }

    public function activity($id)
    {
        $game = Game::findOrFail($id);
        $players = $game->players;
        foreach ($players as $player){
            $has_result = !!GameResult::where([
                'by_player_id' => Auth::user()->id,
                'for_game_id' => $game->id
            ])->orderBy('created_at', 'DESC')->with([
                'results'
            ])->first();
            $player->has_result = $has_result;
        }
        return $players;
    }

    public function update(UpdateGamesRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());

        return $game;
    }

    public function store(StoreGamesRequest $request)
    {
        $game = Game::create($request->only(['name', 'is_active', 'scenario_id']));
        $game->owner_id = Auth::user()->id;
        $game->save();
        return $game;
    }

    public function getAllResultsForTheGame($id)
    {
        return GameResult::where('for_game_id', $id)->orderBy('created_at', 'DESC')->with([
            'by_player',
            'results'
        ])->paginate();
    }
}
