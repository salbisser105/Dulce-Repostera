@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.listProduct')</div>
                <div class="card-body">
                    @foreach($data["products"] as $product)
                        <br><a style="color:black" href="{{ route('product.show',$product->getId()) }}">{{ $product->getId() }} - {{ $product->getName() }} : {{ $product->getPrice() }}</a><img width="200" height="150" src='/img/product/{{ $product->getImage() }}' class="list-picture">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection