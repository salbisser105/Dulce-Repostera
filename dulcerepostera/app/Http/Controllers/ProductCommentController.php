<?php

//Created by: Ricardo Saldarriaga

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductComment;
use App\Product;
use Illuminate\Support\Facades\Lang;

class ProductCommentController extends Controller {

    public function delete($id){
        $comment = ProductComment::find($id);

        $productRating = Product::findOrFail($comment->product_id)->getRating();
        $numRatings = count(ProductComment::where('product_id',$comment->product_id)->get());
        $productRating = (($productRating*$numRatings)-($comment->getRating()))/($numRatings-1);
        $update = Product::where('id',$comment->product_id)->update(['rating' => $productRating]);

        $comment->delete();
        $message = Lang::get('messages.deleteComment');
        return back()->with('deleted',$message);
    }

    public function save(Request $request){
        $request->validate(ProductComment::validate());
        $productRating = Product::findOrFail($request->product_id)->getRating();
        $numRatings = count(ProductComment::where('product_id',$request->product_id)->get());
        $productRating = (($productRating*$numRatings)+($request->rating))/($numRatings+1);
        $update = Product::where('id',$request->product_id)->update(['rating' => $productRating]);

        ProductComment::create($request->only(["description", "user_id", "product_id","rating"]));
        $message = Lang::get('messages.commentCreated');
        return back()->with('success',$message);
    }

}