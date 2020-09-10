@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create product</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form method="POST" action="{{ route('product.save') }}">
                    @csrf
                    <p>
                        Nombre: <input type="text" placeholder="Insert name" name="name" value="{{ old('name') }}" />
                    </p>
                    <br><p>
                        Precio: <input type="text" placeholder="Insert price" name="price" value="{{ old('price') }}" />
                    </p>
                    <br><p>
                        Categoria: <input type="text" placeholder="Ingresar categorias" name="category" value="{{ old('category') }}" />
                    </p>
                    <br><p>
                        Descripción:<br>
                         <textarea name1="text" cols="40" rows="5" placeholder="Ingresar descripción" name="description" value="{{ old('description') }}"></textarea>
                    </p>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="product_image" />
                    </div>
                    
                    <br><p>
                        Ingredientes: <input type="text" placeholder="Ingresar ingredientes" name="ingredients" value="{{ old('ingredients') }}" />
                    </p>
                    <br><input type="submit" value="Enviar" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection