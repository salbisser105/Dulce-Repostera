<?php

//Created by: Santiago Albisser

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\FavPosts;
use App\PostComment;
use Illuminate\Support\Facades\Lang;

class PostController extends Controller{

    public function show(){
        $data = [];                
        $data["title"] = "Lista de posts";
        $data["post"] = Post::all();
        return view('post.show')->with("data",$data);
    }

    public function edit($id){
        $data = [];
        $post = Post::findOrFail($id);
        $data["title"] = $post->getName();
        $data["post"] = $post;
        return view('post.edit')->with("data", $data);
    }

    public function create(){
        $data = [];
        $data["title"] = "Create post";
        $data["posts"] = Post::all();
        return view('post.create')->with("data", $data);
    }

    public function saveEdit(Request $request){
        $request->validate(Post::validate());
        $id =$request->input('id');
        Post::where('id',$id)->update($request->only(["name","description","user_id"]));
        $message = Lang::get('messages.postCreated');
        return redirect()->route('post.showpost',$id)->with('success',$message);
    }

    public function save(Request $request){
        $request->validate(Post::validate());
        Post::create($request->only(["name","description","user_id"]));
        $message = Lang::get('messages.postCreated');
        return back()->with('success',$message);
    }

    public function showpost($id){
        $data = [];
        $post = Post::findOrFail($id);                
        $data["title"] =$post->getName();
        $data["post"] = $post;
        return view('post.showpost')->with("data",$data);
    }
    
    public function delete($id){
        $others = FavPosts::where("post_id",$id)->get();
        if($others != null){
            foreach($others as $other){
                $other->delete();
            }
        }
        $others = PostComment::where("post_id",$id)->get();
        if($others != null){
            foreach($others as $other){
                $other->delete();
            }
        }
        $post= Post::find($id);
        $post->delete();
        $message = Lang::get('messages.postDeleted');
        return redirect('post/show')->with('deleted',$message);
    }
}
