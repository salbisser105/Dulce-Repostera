<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@lang('messages.cart')</div>
                        <div class="card-body">            
                            <!-- @foreach($data["products"] as $product)
                                <li><b>@lang('messages.name')</b>: {{ $product->getName() }} - <b>@lang('messages.productPrice')</b>: {{ $product->getPrice()}}
                                    - <b>@lang('messages.quantity')</b>: {{ Session::get('products')[$product->getId()] }}</li>

                            @endforeach -->

                            @for ($i = 0; $i < count($data["name"]);$i++)
                            <li>
                                <b>@lang('messages.name')</b>: {{ $data["name"][$i] }} - <b>@lang('messages.productPrice')</b>: {{ $data["price"][$i]}}
                                - <b>@lang('messages.quantity')</b>: {{ Session::get('products')[$data["id"][$i]] }}
                            </li>
                            @endfor
                            <br />
                            <div class="row">
                                <div class="col">
                                    @if ($data["moneda"] == 0)
                                    <a class="btn btn-primary" href="{{ route('product.usd') }}">USD</a>
                                    @else
                                    <a class="btn btn-primary" href="{{ route('product.cart') }}">COP</a>
                                    @endif
                                </div>
                            </div>
                                
                            <b>@lang('messages.total'):</b> {{$data["precio"]}}
                            
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('product.buy') }}" method="POST">
                                        @csrf
                                        <button type="submit">@lang('messages.buy')</button>
                                    </form> 
                                    <form action="{{ route('product.pdfView') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="pdf" value="{{Auth::user()->getName()}}">
                                        <button type="submit">@lang('messages.pdf')</button>
                                    </form> 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection