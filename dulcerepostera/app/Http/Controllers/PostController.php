<?php

//Created by: Santiago Albisser

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function show()
    {
        $data = [];                
        $data["title"] = "Lista de posts";
        $data["post"] = Post::all();
        return view('post.show')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create post";
        $data["posts"] = Post::all();
        return view('post.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",            
            "description" => "required",
            "user_id" => "required"          
        ]);
        
        Post::create($request->only(["name","description","user_id"]));
        return back()->with('success','Item created successfully!');
    }

    public function showpost($id)
    {
        $data = [];
        $post = Post::findOrFail($id);                
        $data["title"] =$post->getName();
        $data["post"] = $post;
        return view('post.showpost')->with("data",$data);
    }
    
    public function delete($id){
        $post= Post::find($id);
        $post->delete();
        return redirect('post/show')->with('deleted',"Your post has been deleted.");
    }
}
