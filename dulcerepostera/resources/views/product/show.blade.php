@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]["name"] }}</div>
                <div class="card-body">
                    <b>Product name:</b> {{ $data["product"]["name"] }}<br />
                    <b>Product price:</b> {{ $data["product"]["price"] }}<br />
                    <form method="POST" action='{{ route("product.delete",$data["product"]->getId()) }}'>
                        @csrf
                        <div>
                            <button type="submit">Eliminar</button>
                        </div>
                    </form>
                    <br /><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection