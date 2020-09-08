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
                        Nombre: <input type="text" placeholder="Ingresar nombre" name="name" value="{{ old('name') }}" />
                    </p>
                    <br><p>
                        Precio: <input type="text" placeholder="Ingresar precio" name="price" value="{{ old('price') }}" />
                    </p>
                    <br><input type="submit" value="Enviar" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
