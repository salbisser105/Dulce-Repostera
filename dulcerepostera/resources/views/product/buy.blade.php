<!--Created by: Juan Pablo Leal-->

@extends('layouts.master')

@section('content')

<div class="container mb-5">
    <div class="col-md">
        <div class="text-center" id="wishlist">
            <img src="{{ asset('storage/various_images/compra_realizada.png') }}" alt="">
            <h3><small>@lang('messages.purchase_made')</small></h3>
            <form action="{{ route('product.generateFile', $id) }}" method="POST">
                @csrf
                <select type="text" class='form-control' name="select">
                    
                    <option value="pdf">@lang('messages.pdf')</option>
                    <option value="excel">@lang('messages.excel')</option>
                </select>
                <input type="hidden" name="pdf" value="{{ Auth::user()->getName() }}">
                <input type="hidden" name="id" value="{{ Auth::user()->getId() }}">
                <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">el foforro</button>
            </form>
            <a href="{{ route('home.index') }}" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">el foforro</a>
        </div>
    </div>

</div>

@endsection