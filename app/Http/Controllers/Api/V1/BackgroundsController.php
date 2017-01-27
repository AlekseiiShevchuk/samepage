<?php

namespace App\Http\Controllers\Api\V1;

use App\Background;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackgroundsRequest;
use App\Http\Requests\UpdateBackgroundsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BackgroundsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Background::all();
    }

    public function show($id)
    {
        return Background::findOrFail($id);
    }

    public function update(UpdateBackgroundsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $background = Background::findOrFail($id);
        $background->update($request->all());

        return $background;
    }

    public function store(StoreBackgroundsRequest $request)
    {
        $request = $this->saveFiles($request);
        $background = Background::create($request->all());

        return $background;
    }

    public function destroy($id)
    {
        $background = Background::findOrFail($id);
        $background->delete();
        return '';
    }
}
