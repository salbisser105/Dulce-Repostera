<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="color: deeppink; text-align:center;">@lang('messages.createProduct')</h2><br>
                @guest
                    @lang('messages.guestCreateProduct')<a href="{{ route('home.index') }}">Dulce Repostera</a>
                @else
                    @if (Auth::user()->getRole()=="admin")
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                            @csrf
                            <p>
                                <b>@lang('messages.productName')</b>: <input type="text" placeholder="@lang('messages.productName')" name="name" value="{{ old('name') }}" />
                            </p>
                            <br><p>
                                <b>@lang('messages.productPrice')</b>: <input type="text" placeholder="@lang('messages.productPrice')" name="price" value="{{ old('price') }}" />
                            </p>
                            <br><p>
                                <b>@lang('messages.productCategory')</b>: 
                                <!-- <input type="text" placeholder="@lang('messages.productCategory')" name="category" value="{{ old('category') }}" /> -->
                                <select name="category">
                                    <option value="Cupcakes">@lang('messages.Cupcakes')</option> 
                                    <option value="Trufas" {{ (old("category") == "Trufas") ? "selected" : ""}}>@lang('messages.Trufas')</option> 
                                    <option value="Chocolates" {{ (old("category") == "Chocolates") ? "selected" : ""}}>@lang('messages.Chocolates')</option>
                                    <option value="Galletas" {{ (old("category") == "Galletas") ? "selected" : ""}}>@lang('messages.Galletas')</option>
                                    <option value="Panes" {{ (old("category") == "Panes") ? "selected" : ""}}>@lang('messages.Panes')</option>
                                    <option value="Tortas" {{ (old("category") == "Tortas") ? "selected" : ""}}>@lang('messages.Tortas')</option>
                                    <option value="Alfajores" {{ (old("category") == "Alfajores") ? "selected" : ""}}>@lang('messages.Alfajores')</option>
                                    <option value="Macarons" {{ (old("category") == "Macarons") ? "selected" : ""}}>@lang('messages.Macarons')</option>
                                </select>
                            </p>
                            <br><p>
                                <b>@lang('messages.productDescription')</b>:<br>
                                <textarea name="description" cols="40" rows="5" placeholder="Ingresar descripción" value="">{{{ old('description') }}}</textarea>
                            </p>
                            <div class="form-group">
                                <label><b>@lang('messages.image')</b>:</label>
                                <input type="file" name="product_image" value="{{ old('image') }}"/>

                            </div>
                            <br><p>
                                <b>@lang('messages.ingredients')</b>: <input type="text" placeholder="@lang('messages.ingredients')" name="ingredients" value="{{ old('ingredients') }}" />
                            </p>
                            <br><input type="submit" id="button_save" class="btn btn-primary" value="@lang('messages.save')" />
                        </form>
                    @endif
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection