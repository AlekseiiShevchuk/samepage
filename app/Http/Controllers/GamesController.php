<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;

class GamesController extends Controller
{
    /**
     * Display a listing of Game.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('game_access')) {
            return abort(401);
        }
        $games = Game::all();

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating new Game.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('game_create')) {
            return abort(401);
        }
        $relations = [
            'owners' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
            'players' => \App\Player::get()->pluck('nickname', 'id'),
            'results' => \App\Result::get()->pluck('x_coordinate', 'id'),
        ];

        return view('games.create', $relations);
    }

    /**
     * Store a newly created Game in storage.
     *
     * @param  \App\Http\Requests\StoreGamesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGamesRequest $request)
    {
        if (! Gate::allows('game_create')) {
            return abort(401);
        }
        $game = Game::create($request->all());
        $game->players()->sync(array_filter((array)$request->input('players')));
        $game->results()->sync(array_filter((array)$request->input('results')));

        return redirect()->route('games.index');
    }


    /**
     * Show the form for editing Game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('game_edit')) {
            return abort(401);
        }
        $relations = [
            'owners' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
            'players' => \App\Player::get()->pluck('nickname', 'id'),
            'results' => \App\Result::get()->pluck('x_coordinate', 'id'),
        ];

        $game = Game::findOrFail($id);

        return view('games.edit', compact('game') + $relations);
    }

    /**
     * Update Game in storage.
     *
     * @param  \App\Http\Requests\UpdateGamesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGamesRequest $request, $id)
    {
        if (! Gate::allows('game_edit')) {
            return abort(401);
        }
        $game = Game::findOrFail($id);
        $game->update($request->all());
        $game->players()->sync(array_filter((array)$request->input('players')));
        $game->results()->sync(array_filter((array)$request->input('results')));

        return redirect()->route('games.index');
    }


    /**
     * Display Game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('game_view')) {
            return abort(401);
        }
        $relations = [
            'owners' => \App\Player::get()->pluck('nickname', 'id')->prepend('Please select', ''),
            'players' => \App\Player::get()->pluck('nickname', 'id'),
            'results' => \App\Result::get()->pluck('x_coordinate', 'id'),
            'results' => \App\Result::where('for_game_id', $id)->get(),
        ];

        $game = Game::findOrFail($id);

        return view('games.show', compact('game') + $relations);
    }


    /**
     * Remove Game from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('game_delete')) {
            return abort(401);
        }
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('games.index');
    }

    /**
     * Delete all selected Game at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('game_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Game::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
