<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title",$data["title"])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 my-3">
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <h2 class="card-title" style="color:deeppink">{{$data["post"]->getName()}}</h2>
                    {{ $data["post"]->getDescription()}}<br/>
                    @guest
                        @lang('messages.guestFavPost') <a href="{{ route('login') }}">@lang('messages.login')</a> <br>
                    @else
                        <form method="POST" action=" {{ route('favposts.save',$data['post']->getId()) }}">
                            @csrf
                            <div>
                                <br><button type="submit" id="button_add" class="btn btn-primary">@lang('messages.favorites')</button>
                            </div>
                        </form>
                        @if (Auth::user()->getId()==$data["post"]->getUserId())
                            <form method="POST" action='{{ route("post.delete",$data["post"]->getId()) }}'>
                                @csrf
                                <br><button type="submit" id="button_delete" class="btn btn-primary">@lang('messages.delete')</button>
                            </form>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-md my-5">
            <h3 class="card-title" style="color: deeppink;">@lang('messages.comments')</h3><br>
            @foreach($data["post"]->comments as $comment)
            <div class="row">
                <div class="card bg-light mb-3 text-center">
                    <div class="card-body">
                        <br/>{{ $comment->getDescription() }}<br>
                        @guest
                        @else
                            @if (Auth::user()->getId()==$comment->getUserId())
                                <form method="POST" action='{{ route("postcomment.delete",$comment->getId()) }}'>
                                    @csrf
                                    <div>
                                        <br><button type="submit" id="button_delete" class="btn btn-primary">@lang('messages.delete')</button>
                                    </div>
                                </form>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="card bg-light mb-3 text-center">
                    <div class="card-body">
                        <h3 class="card-title" style="color: deeppink;">@lang('messages.createComment')</h3><br>
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
                                <input type="submit" id="button_go" class="btn btn-primary" value="@lang('messages.save')" />
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 