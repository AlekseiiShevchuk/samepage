<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreGameResultsRequest;
use App\Http\Requests\UpdateGameResultsRequest;

class GameResultsController extends Controller
{
    /**
     * Display a listing of GameResult.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('game_result_access')) {
            return abort(401);
        }
        $game_results = GameResult::all();

        return view('game_results.index', compact('game_results'));
    }

    /**
     * Show the form for creating new GameResult.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('game_result_create')) {
            return abort(401);
        }
        $relations = [
            'results' => \App\Result::get()->pluck('id', 'id'),
            'for_games' => \App\Game::get()->pluck('name', 'id')->prepend('Please select', ''),
            'by_players' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
        ];

        return view('game_results.create', $relations);
    }

    /**
     * Store a newly created GameResult in storage.
     *
     * @param  \App\Http\Requests\StoreGameResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameResultsRequest $request)
    {
        if (! Gate::allows('game_result_create')) {
            return abort(401);
        }
        $game = Game::findOrFail($request->get('for_game_id'));
        $game->players()->syncWithoutDetaching([$request->get('by_player_id')]);
        $game_result = GameResult::create($request->all());
        $game_result->results()->sync(array_filter((array)$request->input('results')));

        if ($request->get('is_owner_etalon') == 1) {

            $game->owner_etalon_result_id = $game_result->id;
            $game->save();
        }

        return redirect()->route('game_results.index');
    }


    /**
     * Show the form for editing GameResult.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('game_result_edit')) {
            return abort(401);
        }
        $relations = [
            'results' => \App\Result::get()->pluck('id', 'id'),
            'for_games' => \App\Game::get()->pluck('name', 'id')->prepend('Please select', ''),
            'by_players' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
        ];

        $game_result = GameResult::findOrFail($id);

        return view('game_results.edit', compact('game_result') + $relations);
    }

    /**
     * Update GameResult in storage.
     *
     * @param  \App\Http\Requests\UpdateGameResultsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameResultsRequest $request, $id)
    {
        if (! Gate::allows('game_result_edit')) {
            return abort(401);
        }
        $game_result = GameResult::findOrFail($id);
        $game_result->update($request->all());
        $game_result->results()->sync(array_filter((array)$request->input('results')));

        return redirect()->route('game_results.index');
    }


    /**
     * Display GameResult.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('game_result_view')) {
            return abort(401);
        }
        $relations = [
            'results' => \App\Result::get()->pluck('id', 'id'),
            'for_games' => \App\Game::get()->pluck('name', 'id')->prepend('Please select', ''),
            'by_players' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
            'games' => \App\Game::where('owner_etalon_result_id', $id)->get()
        ];

        $game_result = GameResult::findOrFail($id);

        return view('game_results.show', compact('game_result') + $relations);
    }


    /**
     * Remove GameResult from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('game_result_delete')) {
            return abort(401);
        }
        $game_result = GameResult::findOrFail($id);
        $game_result->delete();

        return redirect()->route('game_results.index');
    }

    /**
     * Delete all selected GameResult at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('game_result_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = GameResult::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
