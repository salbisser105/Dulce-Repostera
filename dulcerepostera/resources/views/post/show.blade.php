<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["post"] as $post)
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <h5 class="card-title" style="color:deeppink">{{ $post->getName() }}</h5>
                    <a href="{{ route('post.showpost',$post->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.ir')</messagges></a>
                </div>
            </div>
            @endforeach
            @guest
            <br> @lang('messages.guestCreatePost')<a href="{{ route('login') }}">@lang('messages.login')</a>
            @else
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <a href="{{ route('post.create') }}" id="button_go" class="btn btn-primary"><b>@lang('messages.newPost')</b></a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection