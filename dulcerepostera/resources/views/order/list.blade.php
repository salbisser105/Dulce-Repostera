<!--Created by: Juan Pablo Leal-->

@extends('layouts.master')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md">
            <h1 class="page-header mt-4">
                <small>laputacabra</small>
            </h1>
            <hr>
        </div>
    </div>

    @if (count($data["orders"]) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($data["orders"] as $orders)
                        <div class="col-md-12">
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <i class="fa fa-clipboard-check" id="order_icon"></i>
                                        </div>
                                        <div class="col-md">
                                            <a href="{{ route('order.show', $orders->getId()) }}"><h4>laputacabra {{ $orders->getDate() }}</h4></a>
                                            <h4>laputacabra{{ $orders->getTotal() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="col-md mt-4">
            <div class="text-center" id="wishlist">
                <h3>@lang('messages.orderno')</h3>
            </div>
        </div>
    @endif

</div>

@endsection