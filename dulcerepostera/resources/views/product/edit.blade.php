<!-- Created by: Ricardo Saldarriaga -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="color: deeppink; text-align:center;">@lang('messages.editProduct')</h2><br>
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
                        <form method="POST" action="{{ route('product.saveEdit') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data['product']['id']}}">
                            <p>
                                <b>@lang('messages.productName')</b>: <input type="text" placeholder="@lang('messages.productName')" name="name" value="{{ $data['product']['name'] }}" />
                            </p>
                            <br><p>
                                <b>@lang('messages.productPrice')</b>: <input type="text" placeholder="@lang('messages.productPrice')" name="price" value="{{ $data['product']['price'] }}" />
                            </p>
                            <br><p>
                                <b>@lang('messages.productCategory')</b>: 
                                <select name="category">
                                    <option value="Cupcakes">@lang('messages.Cupcakes')</option> 
                                    <option value="Trufas" {{ ($data['product']['category'] == "Trufas") ? "selected" : ""}}>@lang('messages.Trufas')</option> 
                                    <option value="Chocolates" {{ ($data['product']['category'] == "Chocolates") ? "selected" : ""}}>@lang('messages.Chocolates')</option>
                                    <option value="Galletas" {{ ($data['product']['category'] == "Galletas") ? "selected" : ""}}>@lang('messages.Galletas')</option>
                                    <option value="Panes" {{ ($data['product']['category'] == "Panes") ? "selected" : ""}}>@lang('messages.Panes')</option>
                                    <option value="Tortas" {{ ($data['product']['category'] == "Tortas") ? "selected" : ""}}>@lang('messages.Tortas')</option>
                                    <option value="Alfajores" {{ ($data['product']['category'] == "Alfajores") ? "selected" : ""}}>@lang('messages.Alfajores')</option>
                                    <option value="Macarons" {{ ($data['product']['category'] == "Macarons") ? "selected" : ""}}>@lang('messages.Macarons')</option>
                                </select>
                            </p>
                            <br><p>
                                <b>@lang('messages.productDescription')</b>:<br>
                                <textarea name="description" cols="40" rows="5" placeholder="Ingresar descripción" value="">{{{ $data['product']['description'] }}}</textarea>
                            </p>
                            <div class="form-group">
                                <label><b>@lang('messages.image')</b>:</label>
                                <input type="file" name="product_image" value="{{ $data['product']['image'] }}"/>

                            </div>
                            <br><p>
                                <b>@lang('messages.ingredients')</b>: <input type="text" placeholder="@lang('messages.ingredients')" name="ingredients" value="{{ $data['product']['ingredients'] }}" />
                            </p>
                            <br><input type="submit" id="button_save" class="btn btn-primary" value="@lang('messages.edit')" />
                        </form>
                    @endif
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection