<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\GameResultHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiStoreGameResultsRequest;
use App\Result;
use Illuminate\Support\Facades\Auth;

class GameResultsController extends Controller
{
    public function index()
    {
        return GameResult::all();
    }

    public function show($id)
    {
        return GameResult::findOrFail($id)->load(['results', 'results.for_image']);
    }

//    public function update(UpdateGameResultsRequest $request, $id)
//    {
//        $game_result = GameResult::findOrFail($id);
//        $game_result->update($request->all());
//
//        return $game_result;
//    }

    public function store(ApiStoreGameResultsRequest $request)
    {
        $game = Game::findOrFail($request->get('for_game_id'));
        $game_result = GameResult::create($request->all());
        $game_result->by_player_id = Auth::user()->id;
        $game_result->save();
        $results_ids_array = [];
        foreach ((array)$request->input('results') as $inputResult) {
            $result = Result::create($inputResult);
            $results_ids_array[] = $result->id;
        }
        $game_result->results()->sync(array_filter($results_ids_array));

        if ($request->get('is_owner_etalon') == 1) {
            $game->owner_etalon_result_id = $game_result->id;
            $game->save();
        }

        if ($request->get('is_owner_etalon') == 0) {
            $gameResultHelper = new GameResultHelper();
            //refresh game result from db
            $game_result = GameResult::find($game_result->id);
            $game_result->result_rate = $gameResultHelper->calculateResultRate($game_result);
            $game_result->save();
        }
        //refresh game result from db
        $game_result = GameResult::find($game_result->id);
        return $game_result->load(['results', 'results.for_image']);
    }


}
