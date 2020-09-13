<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavPosts;
use Illuminate\Support\Facades\Auth;

class FavPostsController extends Controller {

    public function list()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = FavPosts::all();
        return view('wishlist.show')->with("data",$data);
    }

    public function save($postid)
    {
        $favpost = new FavPosts();
        $favpost->user_id = Auth::user()->id;
        $favpost->post_id = $postid;
        $favpost->save();
        return back()->with('success','Post agregasionado');
    }

}