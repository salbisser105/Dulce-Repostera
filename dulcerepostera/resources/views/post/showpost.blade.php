@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div clas="col-md-6 col-lg-6-md-offset-4 col-lg-offset-3">
    <div class="panel panel -primary">
        <div class="panel-heading">Posts</div>
        <div class="panel-body">
            <ul class="list-group">
                <li>{{ $data["post"]->getId() }} - {{ $data["post"]->getName() }} : {{ $data["post"]->getDescription() }}></li>
                <form method="POST" action='{{ route("post.delete",$data["post"]->getId()) }}'>
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </ul>
        </div>
    </div>
</div>
@endsection