<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function changeLanguage($lang)
    {
        // Store the selected locale in the session
        session(['locale' => $lang]);
        
        // Set the locale
        App::setLocale($lang);
        
        return back();
    }

    public function currentLanguage() {
        // Retrieve the currently stored locale from the session
        $locale = session('locale', config('app.locale'));
    
        // Set the locale
        App::setLocale($locale);
    
        // Return the locale as JSON response
        return response()->json(['locale' => $locale]);
    }
    
    
    
}
