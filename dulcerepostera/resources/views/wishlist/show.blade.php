@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wishlist</div>
                <div class="card-body">
                    @foreach($data["products"] as $productWishlist)
                        <br><a style="color:black" href="{{ route('product.show',$product->getId()) }}">
                        {{ $productWishlist->getProductId() }} : {{ $productWishlist->product->getName()}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection