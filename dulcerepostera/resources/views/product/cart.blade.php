<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <div class="card bg-light mb-3 text-center">
                    <div class="card-body">   
                    <h5 class="card-title" style="color: deeppink;">@lang('messages.cart')</h5>         
                        <!-- @foreach($data["products"] as $product)
                            <li><b>@lang('messages.name')</b>: {{ $product->getName() }} - <b>@lang('messages.productPrice')</b>: {{ $product->getPrice()}}
                                - <b>@lang('messages.quantity')</b>: {{ Session::get('products')[$product->getId()] }}</li>
                        @endforeach -->

                        @for ($i = 0; $i < count($data["name"]);$i++)
                        <li>
                            {{ $data["name"][$i] }} - <b>@lang('messages.productPrice')</b>: $ {{ $data["price"][$i]}}
                            - <b>@lang('messages.quantity')</b>: {{ Session::get('products')[$product->getId()] }}
                        </li>
                        @endfor
                        <br />
                        <b>@lang('messages.total'):</b> $ {{$data["precio"]}}<br>
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('product.usd') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="from_currency" value="COP">
                                            <input type="hidden" name="to_currency" value="USD">
                                            <input type="hidden" name="amount" value={{$data["precio"]}}>
                                            <button type="submit" id="button_toUsd" class="btn btn-primary">@lang('messages.toUSD')</button>
                                </from>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('product.buy') }}" method="POST">
                                    @csrf
                                    <br><button type="submit" id="button_add" class="btn btn-primary"><b>@lang('messages.buy')</b></button>
                                </form> 
                                <a id="button_add" class="btn btn-primary" href="{{ route('product.pdfView') }}"><b>Export to PDF</b></a>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection