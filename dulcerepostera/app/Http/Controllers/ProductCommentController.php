<?php

//Created by: Ricardo Saldarriaga

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductComment;
use App\Product;

class ProductCommentController extends Controller {

    public function delete($id)
    {
        $comment = ProductComment::find($id);

        $productRating = Product::findOrFail($comment->product_id)->getRating();
        $numRatings = count(ProductComment::where('product_id',$comment->product_id)->get());
        $productRating = (($productRating*$numRatings)-($comment->getRating()))/($numRatings-1);
        $update = Product::where('id',$comment->product_id)->update(['rating' => $productRating]);

        $comment->delete();
        return back()->with('deleted',"Se fue");
    }

    public function save(Request $request)
    {
        $request->validate([
            "description" => "required",
            "user_id" => "required",
            "product_id" => "required",
            "rating" => "required|numeric"
        ]);
        $productRating = Product::findOrFail($request->product_id)->getRating();
        $numRatings = count(ProductComment::where('product_id',$request->product_id)->get());
        $productRating = (($productRating*$numRatings)+($request->rating))/($numRatings+1);
        $update = Product::where('id',$request->product_id)->update(['rating' => $productRating]);

        ProductComment::create($request->only(["description", "user_id", "product_id","rating"]));
        return back()->with('success','Elemento creado satisfactoriamente');
    }

}