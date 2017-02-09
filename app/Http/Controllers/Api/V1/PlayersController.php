<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePlayersRequest;
use App\Player;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function show()
    {
        return Auth::user();
    }

    public function showResults()
    {
        return GameResult::where(['by_player_id' => Auth::user()->id])->orderBy('created_at', 'DESC')->with([
            'results',
            'for_game'
        ])->paginate();
    }

    public function showResultsByGame($id)
    {
        $game = Game::findOrFail($id);
        return GameResult::where([
            'by_player_id' => Auth::user()->id,
            'for_game_id' => $game->id
        ])->orderBy('created_at', 'DESC')->with([
            'results'
        ])->first();
    }

    public function showResultsByGameAndPlayer(Player $player, Game $game)
    {
        return GameResult::where([
            'by_player_id' => $player->id,
            'for_game_id' => $game->id
        ])->orderBy('created_at', 'DESC')->with([
            'results'
        ])->first();
    }

    public function showOwnedGames()
    {
        return Game::where(['owner_id' => Auth::user()->id])->orderBy('created_at',
            'DESC')->with(['owner_etalon_result', 'scenario'])->paginate();
    }

    public function update(UpdatePlayersRequest $request)
    {
        Auth::user()->nickname = ($request->get('nickname'));
        Auth::user()->save();
        return Auth::user();
    }
}
