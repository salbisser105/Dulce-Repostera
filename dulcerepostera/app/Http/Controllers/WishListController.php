<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller {


    public function create()
    {

    }

    public function save(Request $request)
    {
        $wishlist = new WishList();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
        return back()->with('success','Produto agregasionado');
    }

}