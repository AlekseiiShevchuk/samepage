<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayersRequest;
use App\Http\Requests\UpdatePlayersRequest;

class PlayersController extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function show($id)
    {
        return Player::where(['device_id'=>$id])->firstOrFail();
    }

    public function showResults($id)
    {
        $player = Player::where(['device_id'=>$id])->firstOrFail();
        return GameResult::where(['by_player_id'=>$player->id])->orderBy('created_at','DESC')->with(['results','for_game'])->paginate();
    }

    public function showOwnedGames($id)
    {
        $player = Player::where(['device_id'=>$id])->firstOrFail();
        return Game::where(['owner_id'=>$player->id])->orderBy('created_at','DESC')->with(['owner_etalon_result','scenario'])->paginate();
    }

    public function update(UpdatePlayersRequest $request, $id)
    {
        $player = Player::where(['device_id'=>$id])->firstOrFail();
        $player->nickname = ($request->get('nickname'));

        return $player;
    }

    public function store(StorePlayersRequest $request)
    {
        $player = Player::create($request->all());

        return $player;
    }

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return '';
    }
}
