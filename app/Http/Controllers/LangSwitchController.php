<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Auth;

class LangSwitchController extends Controller
{
    
    public function switchLanguage(Request $request, $locale = null)
    {

    if(!Auth::check()){
        return redirect('/');
    }

    $locale = $request->input('langSwitch');
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();

    }
}
