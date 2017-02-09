<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\StoreImagesRequest;
use App\Http\Requests\UpdateImagesRequest;
use App\Image;
use App\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImagesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('image_access')) {
            return abort(401);
        }
        $images = Image::all();

        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating new Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Gate::allows('image_create')) {
            return abort(401);
        }
        $forScenarioId = false;
        if ($request->has('for_scenario')) {
            $forScenarioId = (int)$request->get('for_scenario');
        }
        return view('images.create')->with('forScenarioId', $forScenarioId);
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param  \App\Http\Requests\StoreImagesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImagesRequest $request)
    {
        if (!Gate::allows('image_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $image = Image::create($request->all());

        if ($request->has('for_scenario')) {
            $id = (int)$request->get('for_scenario');
            $scenario = Scenario::findOrFail($id);
            $scenario->images()->syncWithoutDetaching([$image->id]);
            return redirect()->route('scenarios.index');
        }

        return redirect()->route('images.index');
    }


    /**
     * Show the form for editing Image.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('image_edit')) {
            return abort(401);
        }
        $image = Image::findOrFail($id);

        return view('images.edit', compact('image'));
    }

    /**
     * Update Image in storage.
     *
     * @param  \App\Http\Requests\UpdateImagesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImagesRequest $request, $id)
    {
        if (!Gate::allows('image_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $image = Image::findOrFail($id);
        $image->update($request->all());

        return redirect()->route('images.index');
    }


    /**
     * Display Image.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('image_view')) {
            return abort(401);
        }
        $relations = [
            'scenarios' => \App\Scenario::whereHas('images',
                function ($query) use ($id) {
                    $query->where('id', $id);
                })->get(),
            'results' => \App\Result::where('for_image_id', $id)->get(),
        ];

        $image = Image::findOrFail($id);

        return view('images.show', compact('image') + $relations);
    }


    /**
     * Remove Image from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('image_delete')) {
            return abort(401);
        }
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('images.index');
    }

    /**
     * Delete all selected Image at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('image_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Image::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
