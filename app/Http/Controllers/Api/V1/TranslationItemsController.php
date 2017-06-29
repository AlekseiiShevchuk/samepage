<?php

namespace App\Http\Controllers\Api\V1;

use App\TranslationItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTranslationItemsRequest;
use App\Http\Requests\UpdateTranslationItemsRequest;

class TranslationItemsController extends Controller
{
   /* public function index()
    {
        return TranslationItem::all();
    }

    public function show($id)
    {
        return TranslationItem::findOrFail($id);
    }

    public function update(Admin\UpdateTranslationItemsRequest $request, $id)
    {
        $translation_item = TranslationItem::findOrFail($id);
        $translation_item->update($request->all());
        

        return $translation_item;
    }

    public function store(Admin\StoreTranslationItemsRequest $request)
    {
        $translation_item = TranslationItem::create($request->all());
        

        return $translation_item;
    }

    public function destroy($id)
    {
        $translation_item = TranslationItem::findOrFail($id);
        $translation_item->delete();
        return '';
    }*/
}
