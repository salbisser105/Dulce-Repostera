@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.createProduct')</div>
                <div class="card-body">
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
                        @lang('messages.productName'): <input type="text" placeholder="@lang('messages.productName')" name="name" value="{{ old('name') }}" />
                    </p>
                    <br><p>
                        @lang('messages.productPrice'): <input type="text" placeholder="@lang('messages.productPrice')" name="price" value="{{ old('price') }}" />
                    </p>
                    <br><p>
                        @lang('messages.productCategory'): <input type="text" placeholder="@lang('messages.productCategory')" name="category" value="{{ old('category') }}" />
                    </p>
                    <br><p>

                        Descripción:<br>
                         <textarea name="description" cols="40" rows="5" placeholder="Ingresar descripción" value="{{ old('description') }}"></textarea>
                    </p>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="product_image" value="{{ old('image') }}"/>

                    </div>
                    
                    <br><p>
                        @lang('messages.ingredients'): <input type="text" placeholder="@lang('messages.ingredients')" name="ingredients" value="{{ old('ingredients') }}" />
                    </p>
                    <br><input type="submit" value="@lang('messages.save')" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection