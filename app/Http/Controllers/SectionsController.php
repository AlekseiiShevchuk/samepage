<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSectionsRequest;
use App\Http\Requests\UpdateSectionsRequest;

class SectionsController extends Controller
{
    /**
     * Display a listing of Section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('section_access')) {
            return abort(401);
        }
        $sections = Section::all();

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating new Section.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('section_create')) {
            return abort(401);
        }
        $relations = [
            'scenarios' => \App\Scenario::get()->pluck('name', 'id'),
        ];

        return view('sections.create', $relations);
    }

    /**
     * Store a newly created Section in storage.
     *
     * @param  \App\Http\Requests\StoreSectionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionsRequest $request)
    {
        if (! Gate::allows('section_create')) {
            return abort(401);
        }
        $section = Section::create($request->all());

        return redirect()->route('sections.index');
    }


    /**
     * Show the form for editing Section.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('section_edit')) {
            return abort(401);
        }
        $relations = [
            'scenarios' => \App\Scenario::get()->pluck('name', 'id'),
        ];

        $section = Section::findOrFail($id);

        return view('sections.edit', compact('section') + $relations);
    }

    /**
     * Update Section in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionsRequest $request, $id)
    {
        if (! Gate::allows('section_edit')) {
            return abort(401);
        }
        $section = Section::findOrFail($id);
        $section->update($request->all());

        return redirect()->route('sections.index');
    }


    /**
     * Display Section.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('section_view')) {
            return abort(401);
        }
        $relations = [
            'scenarios' => \App\Scenario::get()->pluck('name', 'id'),
        ];

        $section = Section::findOrFail($id);

        return view('sections.show', compact('section') + $relations);
    }


    /**
     * Remove Section from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('section_delete')) {
            return abort(401);
        }
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('sections.index');
    }

    /**
     * Delete all selected Section at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('section_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Section::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
