<?php

//Created by: Juan Pablo Leal

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;
use App\User;
use App\WishList;
use App\ProductComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ProductController extends Controller {

    public function show($id){
        $data = [];
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.show')->with("data", $data);
    }

    public function edit($id){
        $data = [];
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.edit')->with("data", $data);
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
        $others = Item::where("product_id",$id)->get();
        if($others != null){
            foreach($others as $other){
                $other->delete();
            }
        }
        $others = WishList::where("product_id",$id)->get();
        if($others != null){
            foreach($others as $other){
                $other->delete();
            }
        }
        $others = ProductComment::where("product_id",$id)->get();
        if($others != null){
            foreach($others as $other){
                $other->delete();
            }
        }
        $product = Product::find($id);
        $product->delete();
        $message = Lang::get('messages.productDeleted');
        return redirect('product/list')->with('deleted', $message);
    }

    public function saveEdit(Request $request){
        $name = "";
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/product/',$name);
        }
        $request->validate(Product::validate());

        $id =$request->input('id');

        if($request->hasFile('product_image')){
            Product::where('id',$id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'image' => $name,
                'ingredients' => $request->input('ingredients')
            ]);
        } else {
            Product::where('id',$request->input('id'))->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients')
            ]);
        }
        $message = Lang::get('messages.productEdited');
        return redirect()->route('product.show',$id)->with('success',$message);
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
            $prName = array();
            $prPrice = array();
            $prId = array();
            $precio=0;
            foreach($productsModels as $product)
            {
                array_push($prName,$product->getName());
                array_push($prPrice,$product->getPrice());
                array_push($prId,$product->getId());
                $precio += $request->session()->get("products")[$product->getId()] * $product->getPrice();
            }
            $data["products"] = $productsModels;
            $data["name"] = $prName;
            $data["price"] = $prPrice;
            $data["precio"] = $precio;
            $data["id"] = $prId;
            $data["moneda"] = 0;
            // dd(count($prPrice)); 
            return view('product.cart')->with("data", $data);
        }
        return redirect()->route('product.list');
    }

    public function usd(Request $request){
        $products = $request->session()->get("products");
        $keys = array_keys($products);
        $productsModels = Product::find($keys);
        $prName = array();
        $prPrice = array();
        $prId = array();
        $precio=0;
        //Comienzo API
        $from_currency = "COP";
        $to_currency = "USD";
        $apikey = "803332e007126d41e9a9";
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        $obj = json_decode($json, true);
        $val = floatval($obj["$query"]);
        //Fin APi
        foreach($productsModels as $product)
        {
            array_push($prName,$product->getName());
            array_push($prId,$product->getId());
            $total = $val * $product->getPrice();
            array_push($prPrice,number_format($total, 2, '.', ''));
            $precio += $request->session()->get("products")[$product->getId()] * number_format($total, 2, '.', '');
        }
        $data["products"] = $productsModels;
        $data["name"] = $prName;
        $data["price"] = $prPrice;
        $data["precio"] = $precio;
        $data["id"] = $prId;
        $data["moneda"] = 1;
        return view('product.cart')->with("data", $data);
    }

    public function buy(Request $request){
        $order = new Order();
        $order->setTotal("0");
        $order->setUserId(Auth::user()->id);
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
        }
        $message = Lang::get('messages.purchaseDone');
        return back()->with('success', $message);
    }
    
    public function pdfView(Request $request)
    {
        $order = [];
        $order['Total'] = 0;
        $userid = $request->input("pdf");
        $id = $request->input("id");
        // $order->setUserId($id.toInteger());
        // $order->save();
        $data = [];
        $data['products'] = [];

        $precioTotal = 0;

        $products = $request->session()->get("products");
        if ($products)
        {
            $keys = array_keys($products);
            for ($i=0;$i<count($keys);$i++)
            {
                $item = [];
                $item['product'] = Product::find($keys[$i]);
                $item['order'] = $order;
                $item['quantity'] = $products[$keys[$i]];
                array_push($data['products'], $item);
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
            }

            $order['Total']=($precioTotal);
            $data['order'] = $order;
            $data['userid']= $userid;
            view()->share('data',$data);

        }

        // dd($id);

        $pdf = PDF::loadView('pdf/pdfview', $data);
        return $pdf->download('pdf_file.pdf');
    }
    

}
