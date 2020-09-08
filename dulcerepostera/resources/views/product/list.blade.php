@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    @foreach($data["products"] as $product)
                        <br><a style="color:black" href="{{ route('product.show',$product->getId()) }}">{{ $product->getId() }} - {{ $product->getName() }} : {{ $product->getPrice() }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection