<?php

namespace App\Http\Controllers;

use App\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreScenariosRequest;
use App\Http\Requests\UpdateScenariosRequest;

class ScenariosController extends Controller
{
    /**
     * Display a listing of Scenario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('scenario_access')) {
            return abort(401);
        }
        $scenarios = Scenario::all();

        return view('scenarios.index', compact('scenarios'));
    }

    /**
     * Show the form for creating new Scenario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('scenario_create')) {
            return abort(401);
        }
        $relations = [
            'backgrounds' => \App\Background::get()->pluck('description', 'id')->prepend('Please select', ''),
            'images' => \App\Image::get()->pluck('name', 'id'),
        ];

        return view('scenarios.create', $relations);
    }

    /**
     * Store a newly created Scenario in storage.
     *
     * @param  \App\Http\Requests\StoreScenariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScenariosRequest $request)
    {
        if (! Gate::allows('scenario_create')) {
            return abort(401);
        }
        $scenario = Scenario::create($request->all());
        $scenario->images()->sync(array_filter((array)$request->input('images')));

        return redirect()->route('scenarios.index');
    }


    /**
     * Show the form for editing Scenario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('scenario_edit')) {
            return abort(401);
        }
        $relations = [
            'backgrounds' => \App\Background::get()->pluck('name', 'id')->prepend('Please select', ''),
            'images' => \App\Image::get()->pluck('name', 'id'),
        ];

        $scenario = Scenario::findOrFail($id);

        return view('scenarios.edit', compact('scenario') + $relations);
    }

    /**
     * Update Scenario in storage.
     *
     * @param  \App\Http\Requests\UpdateScenariosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScenariosRequest $request, $id)
    {
        if (! Gate::allows('scenario_edit')) {
            return abort(401);
        }
        $scenario = Scenario::findOrFail($id);
        $scenario->update($request->all());
        $scenario->images()->sync(array_filter((array)$request->input('images')));

        return redirect()->route('scenarios.index');
    }


    /**
     * Display Scenario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('scenario_view')) {
            return abort(401);
        }
        $relations = [
            'backgrounds' => \App\Background::get()->pluck('description', 'id')->prepend('Please select', ''),
            'images' => \App\Image::get()->pluck('name', 'id'),
        ];

        $scenario = Scenario::findOrFail($id);

        return view('scenarios.show', compact('scenario') + $relations);
    }


    /**
     * Remove Scenario from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('scenario_delete')) {
            return abort(401);
        }
        $scenario = Scenario::findOrFail($id);
        $scenario->delete();

        return redirect()->route('scenarios.index');
    }

    /**
     * Delete all selected Scenario at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('scenario_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Scenario::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
