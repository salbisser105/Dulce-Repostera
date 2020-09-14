@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.posts')</div>
                <div class="card-body">
                @foreach($data["post"] as $post)
                    <li><a style="color:black" href="{{ route('post.showpost',$post->getId())}}">{{ $post->getId() }} - {{ $post->getName() }} : {{ $post->getDescription() }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection