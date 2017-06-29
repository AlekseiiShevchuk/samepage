<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Language;
use App\TranslationItem;

class LanguagesController extends Controller
{

    public function index()
    {
        return [
            'available_languages' => Language::where('is_active_for_users', 1)->get()->makeHidden(['created_at','updated_at','is_active_for_admin', 'is_active_for_users']),
            'translations' => TranslationItem::all(Language::getAvailableColumnsForTranslationItems())
            ];
    }

}
