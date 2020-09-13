@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    @foreach($data["products"] as $product)
                    <li>Nombre: {{ $product->getName() }} - Precio: {{ $product->getPrice() }}
                        - Cantidad: {{ Session::get('products')[$product->getId()] }}</li>
                    @endforeach
                    <br /><br />
                    Total: tu precio es secreto
                    <form action="{{ route('product.buy') }}" method="POST">
                        @csrf
                        <button type="submit">Buy</button>
                        </from>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection