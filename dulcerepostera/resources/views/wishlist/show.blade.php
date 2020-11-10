<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                @foreach($data["products"] as $productWishlist)
                    <div class="card bg-light mb-3 text-center">
                        <img width="200" height="150" src="{{ asset('/img/product/'.$productWishlist->product->getImage()) }}" class="list-picture">
                        <div class="card-body">
                            <h5 class="card-title" style="color:deeppink">{{ $productWishlist->product->getName() }}</h5>
                            $ {{ $productWishlist->product->getPrice() }}<br><br>
                            <a href="{{ route('product.show',$productWishlist->product->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.ir')</messagges></a><br><br>
                            <form method="POST" action='{{ route("wishlist.delete",$productWishlist->getId()) }}'>
                            @csrf
                                <div>
                                    <button type="submit" class ="btn btn-primary" id="button_delete">@lang('messages.delete')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
