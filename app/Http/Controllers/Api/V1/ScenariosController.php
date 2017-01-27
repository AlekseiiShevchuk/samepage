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
        return Scenario::all();
    }

    public function show($id)
    {
        return Scenario::findOrFail($id);
    }

    public function update(UpdateScenariosRequest $request, $id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->update($request->all());

        return $scenario;
    }

    public function store(StoreScenariosRequest $request)
    {
        $scenario = Scenario::create($request->all());

        return $scenario;
    }

    public function destroy($id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->delete();
        return '';
    }
}
