<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {

    public function show($id)
    {
        $data = [];
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.show')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = Product::all();
        return view('product.create')->with("data",$data);
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = Product::all();
        return view('product.list')->with("data",$data);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product/list')->with('deleted',"Se fue");
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Product::create($request->only(["name","price"]));
        return back()->with('success','Elemento creado satisfactoriamente');
    }

}