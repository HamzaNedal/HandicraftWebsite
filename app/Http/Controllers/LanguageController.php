<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {

        $request->validate([
            'language' => 'required'
        ]);

        Session::put('locale' , $request->language);
        return \redirect()->back();

    }
}
