<?php

namespace App\Http\Controllers\Api\V1;

use App\Game;
use App\GameResult;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiStoreGameResultsRequest;
use App\Result;

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
        $game->players()->syncWithoutDetaching([$request->get('by_player_id')]);
        $game_result = GameResult::create($request->all());
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

        return $game_result->load(['results', 'results.for_image']);
    }

//    public function destroy($id)
//    {
//        $game_result = GameResult::findOrFail($id);
//        $game_result->delete();
//        return '';
//    }
}
