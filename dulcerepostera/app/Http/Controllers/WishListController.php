<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller {

    public function list()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = WishList::all();
        return view('wishlist.show')->with("data",$data);
    }

    public function save($productid)
    {
        $wishlist = new WishList();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $productid;
        $wishlist->save();
        return back()->with('success','Produto agregasionado');
    }

}