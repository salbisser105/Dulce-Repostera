<?php

//Created by: Juan Pablo Leal

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class WishListController extends Controller {

    public function delete($id){
        $wishlist = WishList::find($id);
        $wishlist->delete();
        $message = Lang::get('messages.productDeletedFromWish');
        return back()->with('deleted',$message);
    }
    
    public function list(){
        $data = [];
        $data["title"] = "Wishlist";
        $data["products"] = WishList::all()->where('user_id', '==', Auth::user()->id);
        return view('wishlist.show')->with("data",$data);
    }

    public function save($productid){
        $wishlist = new WishList();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $productid;
        $wishlist->save();
        $message = Lang::get('messages.productAddedToWish');
        return back()->with('success',$message);
    }

}