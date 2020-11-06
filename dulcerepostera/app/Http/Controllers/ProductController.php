<?php

//Created by: Juan Pablo Leal

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;
use Illuminate\Support\Facades\Lang;

class ProductController extends Controller {

    public function show($id){
        $data = [];
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.show')->with("data", $data);
    }

    public function create(){
        $data = [];
        $data["title"] = "Create product";
        return view('product.create')->with("data",$data);

    }

    public function list(){
        $data = [];
        $data["title"] = "List product";
        $data["products"] = Product::with("comments")->get();
        return view('product.list')->with("data",$data);
    }

    public function list_rating($rating){
        $data = [];
        $data["title"] = "List product";
        $data["products"] = Product::where('rating','>=',$rating)->get();
        return view('product.list')->with("data",$data);

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        $message = Lang::get('messages.productDeleted');
        return redirect('product/list')->with('deleted', $message);
    }

    public function save(Request $request){
        $name = "";
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/product/',$name);
        }
        $request->validate(Product::validate());

        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image' => $name,
            'ingredients' => $request->input('ingredients')
        ]);
        $message = Lang::get('messages.productCreated');
        return back()->with('success',$message);
    }

    public function addToCart($id, Request $request){
        $data = [];
        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);
        $message = Lang::get('messages.productAddedToCart');
        return back()->with('success',$message);
    }

    public function removeCart(Request $request){
        $request->session()->forget('products');
        return redirect()->route('product.list');
    }

    public function cart(Request $request){
        $products = $request->session()->get("products");
        if ($products) {

            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;      
            return view('product.cart')->with("data", $data);
        }
        return redirect()->route('product.list');
    }

    public function buy(Request $request){
        $order = new Order();
        $order->setTotal("0");
        $order->save();
        $precioTotal = 0;

        $products = $request->session()->get("products");
        if ($products) {
            $keys = array_keys($products);
            for ($i = 0; $i < count($keys); $i++) {
                $item = new Item();
                $item->setProductId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($products[$keys[$i]]);
                $item->save();
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice() * $products[$keys[$i]];
                
            }
            $order->setTotal($precioTotal);
            $order->save();
            $request->session()->forget('products');
        }
        $message = Lang::get('messages.purchaseDone');
        return back()->with('success', $message);
    }
}
