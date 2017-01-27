<?php

namespace App\Http\Controllers\Api\V1;

use App\GameResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameResultsRequest;
use App\Http\Requests\UpdateGameResultsRequest;

class GameResultsController extends Controller
{
    public function index()
    {
        return GameResult::all();
    }

    public function show($id)
    {
        return GameResult::findOrFail($id);
    }

    public function update(UpdateGameResultsRequest $request, $id)
    {
        $game_result = GameResult::findOrFail($id);
        $game_result->update($request->all());

        return $game_result;
    }

    public function store(StoreGameResultsRequest $request)
    {
        $game_result = GameResult::create($request->all());

        return $game_result;
    }

    public function destroy($id)
    {
        $game_result = GameResult::findOrFail($id);
        $game_result->delete();
        return '';
    }
}
