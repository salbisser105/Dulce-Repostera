<!--Created by: Juan Pablo Leal-->

@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8" style="color: deeppink;">
                            <h4>@lang('messages.order')</h4>
                        </div>
                    </div>
                    <hr>
                    @foreach ($data["items"] as $items)
                        <div class="row my-2">
                            <div class="col-md-10">
                                <h5>{{ $items->product->getName() }}</h5>
                                <div class="row  pl-3">
                                    <h6 class="card-subtitle text-muted mx-2">@lang('messages.quantity'): {{ $items->getQuantity() }}</h6>
                                    <h6 class="card-subtitle text-muted mx-2">@lang('messages.total'): ${{ $items->product->getPrice() * $items->getQuantity()}}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
        </div>
    </div>

@endsection