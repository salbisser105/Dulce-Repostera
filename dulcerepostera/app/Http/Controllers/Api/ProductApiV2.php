<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductApiV2 extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }
}
