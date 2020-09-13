<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller 
{

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
        return view('product.create')->with("data",$data);
    }

    public function list()
    {
        $data = [];
        $data["title"] = "List product";
        $data["products"] = Product::with("comments")->get();
        return view('product.list')->with("data",$data);
    }

    public function list_rating($rating)
    {
        $data = [];
        $data["title"] = "List product";
        $data["products"] = Product::where('rating','>=',$rating)->get();
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
        $name = "";
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/product/',$name);
        }
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "description" => "required",
            "ingredients" => "required"
        ]);
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $name,
            'ingredients' => $request->input('ingredients')
        ]);
        return back()->with('success','Elemento creado satisfactoriamente');
    }
}