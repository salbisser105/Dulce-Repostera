<?php

//Created by:  Juan Pablo Leal

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller 
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()){
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function list(){
        $user_id = User::findOrFail(Auth::user()->id)->getId();
        $data = [];
        $data["orders"] = Order::where('user_id', $user_id)->get();
        
        return view('order.list')->with("data", $data);
    }

}

?>