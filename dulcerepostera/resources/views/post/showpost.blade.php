@extends('layouts.master')

@section("title",$data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$data["post"]->getName()}}</div>
                <div class="card-body">
                <b>@lang('messages.postName'):</b> {{$data["post"]->getName()}}<br/>
                <b>@lang('messages.postDescription'):</b> {{ $data["post"]->getDescription()}}<br/>
                @guest
                @else
                    @if (Auth::user()->getId()==$data["post"]->getId())
                        <form method="POST" action='{{ route("post.delete",$data["post"]->getId()) }}'>
                            @csrf
                            <button type="submit">@lang('messages.delete')</button>
                        </form>
                    @endif
                @endguest

                <b>@lang('messages.comments'):</b>
                @foreach($data["post"]->comments as $comment)
                    <br/>- {{ $comment->getDescription() }}
                    @guest
                    @else
                        @if (Auth::user()->getId()==$comment->getUserId())
                            <form method="POST" action='{{ route("postcomment.delete",$comment->getId()) }}'>
                                @csrf
                                <div>
                                    <button type="submit">@lang('messages.delete')</button>
                                </div>
                            </form>
                        @endif
                    @endguest
                @endforeach

                <br><b>@lang('messages.createComment')</b>
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                @guest
                <br> @lang('messages.guestComment')<a href="{{ route('login') }}">@lang('messages.login')</a>
                @else
                    <form method="POST" action="{{ route('postcomment.save') }}">
                        @csrf
                        <p>
                            @lang('messages.commentDescription'): <input type="text" placeholder="@lang('messages.commentDescription')" name="description" value="{{ old('description') }}" />
                        </p>
                        <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}">
                        <input type="hidden" name="post_id" value='{{$data["post"]->getId()}}'>
                        <input type="submit" value="@lang('messages.save')" />
                    </form>
                @endguest
                
            </ul>
        </div>
    </div>
</div>
@endsection 