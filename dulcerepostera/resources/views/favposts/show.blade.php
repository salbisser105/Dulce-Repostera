<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Favorite Posts</div>
                <div class="card-body">
                    @foreach($data["posts"] as $postFavorites)
                        <br><a style="color:black" href="{{ route('post.showpost',$postFavorites->getId()) }}">
                        {{ $postFavorites->post->getName()}} - {{$postFavorites->post->getDescription() }}</a>
                        <form method="POST" action='{{ route("favposts.delete",$postFavorites->getId()) }}'>
                        @csrf
                            <div>
                                <button type="submit">@lang('messages.delete')</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection