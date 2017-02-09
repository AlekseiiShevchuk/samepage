<?php

namespace App\Http\Controllers\Api\V1;

use App\Scenario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScenariosRequest;
use App\Http\Requests\UpdateScenariosRequest;

class ScenariosController extends Controller
{
    public function index()
    {
        return Scenario::all()->load('background');
    }

    public function show($id)
    {
        return Scenario::findOrFail($id)->load(['background','images'=>function ($query) {
            $query->orderBy('pivot_order_num','asc');
        }]);
    }

    public function update(UpdateScenariosRequest $request, $id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->update($request->all());
        $scenario->images()->sync(array_filter((array)$request->input('images')));

        return $scenario->load(['background','images']);
    }

    public function store(StoreScenariosRequest $request)
    {
        $scenario = Scenario::create($request->all());
        $scenario->images()->sync(array_filter((array)$request->input('images')));

        return $scenario->load(['background','images']);
    }

    public function destroy($id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->delete();
        return '';
    }

}
