@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div clas="col-md-6 col-lg-6-md-offset-4 col-lg-offset-3">
    <div class="panel panel -primary">
        <div class="panel-heading">Posts</div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($data["post"] as $product)
                @if($loop->index==0 || $loop->index==1)
                <li><a style="color:black" href="{{ route('post.showpost',$product->getId())}}"><b>{{ $product->getId() }}</b> - {{ $product->getName() }} : {{ $product->getDescription() }}</a></li>
                @else
                <li><a style="color:black" href="{{ route('post.showpost',$product->getId())}}">{{ $product->getId() }} - {{ $product->getName() }} : {{ $product->getDescription() }}</a></li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection