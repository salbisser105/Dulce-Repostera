@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">wishlist</div>
                <div class="card-body">
                    @foreach($data["products"] as $productWishlist)
                        <br><a style="color:black" href="{{ route('product.show',$productWishlist->getId()) }}">
                        {{ $productWishlist->product->getName()}} - {{$productWishlist->product->getPrice() }}</a><img width="200" height="150" src='/img/product/{{ $productWishlist->product->getImage() }}' class="list-picture">
                        <form method="POST" action='{{ route("wishlist.delete",$productWishlist->getId()) }}'>
                        @csrf
                            <div>
                                <button type="submit">@lang('messages.delete')</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
