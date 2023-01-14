<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationControlller extends Controller
{
    public function index(){
        return view('localization.index');
    }

    public function setLang($language){
        App::setLocale($language);
        // Lưu lại ngôn ngữ
        Session::put("language", $language);
        return redirect()->back();
    }
}
