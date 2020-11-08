<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="row">
                @foreach($data["posts"] as $postFavorites)
                    <div class="card bg-light mb-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color:deeppink">{{ $postFavorites->post->getName() }}</h5>
                            <a href="{{ route('post.showpost',$postFavorites->post->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.ir')</messagges></a>
                        </div>
                        <form method="POST" action='{{ route("favposts.delete",$postFavorites->getId()) }}'>
                        @csrf
                            <div>
                                <button type="submit" id="button_delete" class="btn btn-primary">@lang('messages.delete')</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection