<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Model\Language;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $language = Language::where('prefix', $request->lang)->first();
        if(!empty($language)) {
            App::setLocale($request->lang);
            session()->put('locale', $request->lang);
            session()->put('lang_dir', $language->direction);
            return redirect()->back()->with('success', __('main.language change successfully!'));
        }
        return redirect()->back()->with('dismiss', 'No language found!');

    }
}
