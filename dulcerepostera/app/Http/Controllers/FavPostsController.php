<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavPosts;
use Illuminate\Support\Facades\Auth;

class FavPostsController extends Controller {

    public function delete($id)
    {
        $favpost = FavPosts::find($id);
        $favpost->delete();
        return back()->with('deleted',"Se fue");
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Favorite posts";
        $data["posts"] = FavPosts::all()->where('user_id', '==', Auth::user()->id);
        return view('favposts.show')->with("data",$data);
    }

    public function save($postid)
    {
        $favpost = new FavPosts();
        $favpost->user_id = Auth::user()->id;
        $favpost->post_id = $postid;
        $favpost->save();
        return back()->with('success','Post agregado');
    }

}