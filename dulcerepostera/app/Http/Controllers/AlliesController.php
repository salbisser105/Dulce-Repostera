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

        // $client = new Client([
        //     'base_uri' => 'http://jsonplaceholder.typicode.com',
        //     'timeout' => 2.0,
        // ]);
        // $response = $client->request('GET','posts');

        $client = new Client([
            'base_uri' => 'http://54.227.195.109/audios/',
            'timeout' => 2.0,
        ]);
        $response = $client->request('GET','latest');

        $posts = json_decode($response->getBody()->getContents());
        $data = [];
        $data['title'] = "Aliados";
        $data['posts'] = $posts;
        return view('allies.api')->with("data", $data);
    }
    // Route::get('/allies/index','AlliesController@index')->name("allies.index");
    // Route::get('/allies/api','AlliesController@api')->name("allies.api");

}