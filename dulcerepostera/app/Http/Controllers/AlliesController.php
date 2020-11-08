<?php

//Created by: Ricardo Saldarriaga

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Http;

class AlliesController extends Controller {

    public function index()
    {
        return view('allies.index');
    }

    public function api(){
        $client = new Client([
            'base_uri' => 'http://54.227.195.109/audios/',
            'timeout' => 2.0,
        ]);
        //$respuesta = Http::get('http://54.227.195.109/audios/latest');
        // $response = $client->request('GET','posts');
        $response = "mama";
        dd($response);
    }
    // Route::get('/allies/index','AlliesController@index')->name("allies.index");
    // Route::get('/allies/api','AlliesController@api')->name("allies.api");

}