<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;

class ProductController extends Controller
{

    public function show($id)
    {
        $data = [];
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.show')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = Product::all();
        return view('product.create')->with("data", $data);
    }

    public function list()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["products"] = Product::all();
        return view('product.list')->with("data", $data);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product/list')->with('deleted', "Se fue");
    }

    public function save(Request $request)
    {
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/', $name);
        }
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "description" => "required",
            "product_image" => "required",
            "ingredients" => "required"
        ]);
        Product::create($request->only(["name", "price", "category", "description", "product_image", "ingredients"]));
        return back()->with('success', 'Elemento creado satisfactoriamente');
    }
    public function addToCart($id, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);
        return back();
    }
    public function removeCart(Request $request)

    {
        $request->session()->forget('products');
        return redirect()->route('product.list');
    }

    public function cart(Request $request)
    {
        $products = $request->session()->get("products");

        if ($products) {

            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;
            
            return view('product.cart')->with("data", $data);
        }

        return redirect()->route('product.list');
    }

    public function buy(Request $request)

    {
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
        return back()->with('success', 'you have bought what you wanted.');
    }
}
