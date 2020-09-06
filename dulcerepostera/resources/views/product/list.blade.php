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
                        @if($loop->index==0||$loop->index==1)
                            <br><b><a style="color:black" href="{{ route('product.show',$product->getId()) }}">{{ $product->getId() }}</b> - {{ $product->getName() }} : {{ $product->getPrice() }}</a>
                        @else
                            <br><a style="color:black" href="{{ route('product.show',$product->getId()) }}">{{ $product->getId() }} - {{ $product->getName() }} : {{ $product->getPrice() }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection