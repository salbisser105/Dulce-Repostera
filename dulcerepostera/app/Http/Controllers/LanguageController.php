<?php

//Created by: Ricardo Saldarriaga

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class LanguageController extends Controller{
    
    public function setLanguage($lang){
        app()->setLocale($lang);
        session(['lang' => $lang]);
        return view("home.index");
    }
}