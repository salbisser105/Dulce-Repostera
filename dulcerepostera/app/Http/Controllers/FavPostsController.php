<?php

//Created by: Juan Pablo Leal

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavPosts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class FavPostsController extends Controller {

    public function delete($id){
        $favpost = FavPosts::find($id);
        $favpost->delete();
        $message = Lang::get('messages.productFromFavPostDeleted');
        return back()->with('deleted', $message);
    }

    public function list(){
        $data = [];
        $data["title"] = "Favorite posts";
        $data["posts"] = FavPosts::all()->where('user_id', '==', Auth::user()->id);
        return view('favposts.show')->with("data",$data);
    }

    public function save($postid){
        $favpost = new FavPosts();
        $favpost->user_id = Auth::user()->id;
        $favpost->post_id = $postid;
        $favpost->save();
        $message = Lang::get('messages.postAdded');
        return back()->with('success',$message);
    }

}