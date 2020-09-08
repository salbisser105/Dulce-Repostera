<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductComment;

class ProductCommentController extends Controller {

    public function delete($id)
    {
        $comment = ProductComment::find($id);
        $comment->delete();
        return back()->with('deleted',"Se fue");
    }

    public function save(Request $request)
    {
        $request->validate([
            "description" => "required",
            "user_id" => "required",
            "product_id" => "required"

        ]);
        ProductComment::create($request->only(["description", "user_id", "product_id"]));
        return back()->with('success','Elemento creado satisfactoriamente');
    }

}