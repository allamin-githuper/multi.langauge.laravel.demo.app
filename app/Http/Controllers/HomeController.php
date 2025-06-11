<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Language;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function openHomepage(Request $request)
    {
        $languageCode = $request->language ? $request->language: 'en';

        $language = Language::where('code', $languageCode)->first();

        $languageId = $language ? $language->id: null;

        $item = Item::find(1);

        $translation = $item->translations->where('language_id', $languageId)->first();

        $languages = Language::all();
        // Translation::where('language_id', $languageId)->first();

        if (! $item) {
            abort(404);
        }

        return view('welcome', compact('translation', 'languages'));
    }
}
