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
                        <img width="200" height="150" src='http://54.227.195.109{{ $post->cover_image }}' class="list-picture"> <br>
                        <b>@lang('messages.alDescription'):</b>{{ $post->description }} <br>
                        <b>@lang('messages.alCategories'):</b>{{ $post->categories}}<br>
                        <b>@lang('messages.alContributors'):</b>{{ $post->contributors}}<br>
                        <b>@lang('messages.alPrice'):</b>{{ $post->price}}<br>
                        <br>
                    </div>
                </div>
        @endforeach
        <a href="http://54.227.195.109/login" style="color: deeppink;">@lang('messages.alSeeMore')</a>
        </div>
    </div>
</div>
@endsection

<!-- <img width="200" height="150" src='/img/product/' class="list-picture"> -->