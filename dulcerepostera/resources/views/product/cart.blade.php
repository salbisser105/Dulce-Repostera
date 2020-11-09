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
                                - <b>@lang('messages.quantity')</b>: {{ Session::get('products')[$data["id"][$i]] }}
                            </li>
                            @endfor
                            <br />
                            <b>@lang('messages.total'):</b> $ {{$data["precio"]}}
                            <div class="row">
                                <div class="col">
                                    @if ($data["moneda"] == 0)
                                    <a class="btn btn-primary" id="button_toUsd" href="{{ route('product.usd') }}">USD</a>
                                    @else
                                    <a class="btn btn-primary" id="button_toUsd" href="{{ route('product.cart') }}">COP</a>
                                    @endif
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('product.buy') }}" method="POST">
                                        @csrf
                                        <br><button type="submit" id="button_go" class="btn btn-primary">@lang('messages.buy')</button>
                                    </form> 
                                    @guest
                                    @else
                                    <form action="{{ route('product.pdfView') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="pdf" value="{{Auth::user()->getName()}}">
                                        <br><button type="submit" id="button_goBigger" class="btn btn-primary">@lang('messages.pdf')</button>
                                    </form> 
                                    @endguest
                                </div>
                            </div>
                            <br><a class="btn btn-primary" id="button_delete" href="{{ route('product.removeCart') }}">@lang('messages.removeCart')</a><br>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection