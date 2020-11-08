<!-- Created by: Ricardo Saldarriaga -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($data["posts"] as $post)
                <div class="card bg-light mb-3 text-center">
                    
                    <div class="card-body">
                        <h5 class="card-title" style="color:deeppink">{{ $post->title }}</h5>
                        uID:{{ $post->userId }} ID:{{ $post->id}}<br><br>
                        <b>body:</b>{{ $post->body }} <br><br>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
</div>
@endsection

<!-- <img width="200" height="150" src='/img/product/' class="list-picture"> -->