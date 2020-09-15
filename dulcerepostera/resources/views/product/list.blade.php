<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.listProduct')</div>
                <div class="card-body">
                    <b>@lang('messages.filterBy') @lang('messages.rating'): </b>
                    <a href="{{ route('product.list_rating',0) }}">0</a>
                    <a href="{{ route('product.list_rating',1) }}">1</a>
                    <a href="{{ route('product.list_rating',2) }}">2</a>
                    <a href="{{ route('product.list_rating',3) }}">3</a>
                    <a href="{{ route('product.list_rating',4) }}">4</a>
                    <a href="{{ route('product.list_rating',5) }}">5</a>
                    @foreach($data["products"] as $product)
                        <br><a style="color:black" href="{{ route('product.show',$product->getId()) }}"><b>N:</b>{{ $product->getName() }} <b>P:</b>{{ $product->getPrice() }} <b>R:</b>{{ $product->getRating() }}</a><img width="200" height="150" src='/img/product/{{ $product->getImage() }}' class="list-picture">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection