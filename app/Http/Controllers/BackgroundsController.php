<?php

namespace App\Http\Controllers;

use App\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBackgroundsRequest;
use App\Http\Requests\UpdateBackgroundsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BackgroundsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Background.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('background_access')) {
            return abort(401);
        }
        $backgrounds = Background::all();

        return view('backgrounds.index', compact('backgrounds'));
    }

    /**
     * Show the form for creating new Background.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('background_create')) {
            return abort(401);
        }
        return view('backgrounds.create');
    }

    /**
     * Store a newly created Background in storage.
     *
     * @param  \App\Http\Requests\StoreBackgroundsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBackgroundsRequest $request)
    {
        if (! Gate::allows('background_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $background = Background::create($request->all());

        return redirect()->route('backgrounds.index');
    }


    /**
     * Show the form for editing Background.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('background_edit')) {
            return abort(401);
        }
        $background = Background::findOrFail($id);

        return view('backgrounds.edit', compact('background'));
    }

    /**
     * Update Background in storage.
     *
     * @param  \App\Http\Requests\UpdateBackgroundsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBackgroundsRequest $request, $id)
    {
        if (! Gate::allows('background_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $background = Background::findOrFail($id);
        $background->update($request->all());

        return redirect()->route('backgrounds.index');
    }


    /**
     * Display Background.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('background_view')) {
            return abort(401);
        }
        $relations = [
            'scenarios' => \App\Scenario::where('background_id', $id)->get(),
        ];

        $background = Background::findOrFail($id);

        return view('backgrounds.show', compact('background') + $relations);
    }


    /**
     * Remove Background from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('background_delete')) {
            return abort(401);
        }
        $background = Background::findOrFail($id);
        $background->delete();

        return redirect()->route('backgrounds.index');
    }

    /**
     * Delete all selected Background at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('background_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Background::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
