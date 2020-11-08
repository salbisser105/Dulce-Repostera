<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <b>@lang('messages.filterBy') @lang('messages.rating'): </b>
            <a style="color:deeppink" href="{{ route('product.list_rating',0) }}">0</a>
            <a style="color:deeppink" href="{{ route('product.list_rating',1) }}">1</a>
            <a style="color:deeppink" href="{{ route('product.list_rating',2) }}">2</a>
            <a style="color:deeppink" href="{{ route('product.list_rating',3) }}">3</a>
            <a style="color:deeppink" href="{{ route('product.list_rating',4) }}">4</a>
            <a style="color:deeppink" href="{{ route('product.list_rating',5) }}">5</a>
            <div class="row">
                @foreach($data["products"] as $product)
                <div class="card bg-light mb-3 text-center">
                    <img width="200" height="150" src='/img/product/{{ $product->getImage() }}' class="list-picture">
                    <div class="card-body">
                        <h5 class="card-title" style="color:deeppink">{{ $product->getName() }}</h5>
                        $ {{ $product->getPrice() }}<br><br>
                        <b>@lang('messages.rating'):</b>{{ $product->getRating() }} <br><br>
                        <a href="{{ route('product.show',$product->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.ir')</messagges></a>
                    </div>
                </div>
                @endforeach
                @guest
                @else
                    @if (Auth::user()->getRole()=="admin")
                    <div class="card bg-light mb-3 text-center">
                        <div class="card-body">
                            <a href="{{ route('product.create') }}" id="button_go" class="btn btn-primary"><b>@lang('messages.newProduct')</b></a>
                        </div>
                    </div>
                    @endif
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection