<?php

//Created by: Ricardo Saldarriaga

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;
use Illuminate\Support\Facades\Lang;

class PostCommentController extends Controller {

    public function delete($id){
        $comment = PostComment::find($id);
        $comment->delete();
        $message = Lang::get('messages.deleteComment');
        return back()->with('deleted', $message);
    }

    public function save(Request $request){
        $request->validate(PostComment::validate());
        PostComment::create($request->only(["description", "user_id", "post_id"]));
        $message = Lang::get('messages.commentCreated');
        return back()->with('success', $message);
    }

}