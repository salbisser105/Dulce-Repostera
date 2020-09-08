<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;

class PostCommentController extends Controller {

    public function delete($id)
    {
        $comment = PostComment::find($id);
        $comment->delete();
        return back()->with('deleted',"Se fue");
    }

    public function save(Request $request)
    {
        $request->validate([
            "description" => "required",
            "user_id" => "required",
            "post_id" => "required"

        ]);
        PostComment::create($request->only(["description", "user_id", "post_id"]));
        return back()->with('success','Elemento creado satisfactoriamente');
    }

}