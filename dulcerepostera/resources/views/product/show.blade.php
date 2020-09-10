@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]["name"] }}</div>
                <div class="card-body">
                    <b>@lang('messages.productName'):</b> {{ $data["product"]["name"] }}<br />
                    <b>@lang('messages.productPrice'):</b> {{ $data["product"]["price"] }}<br />
                    <b>@lang('messages.productCategory'):</b> {{ $data["product"]["category"] }}<br />
                    <b>@lang('messages.productDescription'):</b> {{ $data["product"]["description"] }}<br />
                    <b>@lang('messages.ingredients'):</b> {{ $data["product"]["ingredients"] }}<br />
                    @guest
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <form method="POST" action='{{ route("product.delete",$data["product"]->getId()) }}'>
                                @csrf
                                <div>
                                    <button type="submit">@lang('messages.delete')</button>
                                </div>
                            </form>
                        @endif
                    @endguest

                    <b>@lang('messages.comments'):</b>
                    @foreach($data["product"]->comments as $comment)
                        <br/>- {{ $comment->getDescription() }}
                        @guest
                        @else
                            @if (Auth::user()->getId()==$comment->getUserId())
                                <form method="POST" action='{{ route("productcomment.delete",$comment->getId()) }}'>
                                    @csrf
                                    <div>
                                        <button type="submit">@lang('messages.delete')</button>
                                    </div>
                                </form>
                            @endif
                        @endguest
                    @endforeach

                    <br><b>@lang('messages.createComment'):</b>
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @guest
                        @lang('messages.guestComment') <a href="{{ route('login') }}">@lang('messages.login')</a>
                    @else
                        <form method="POST" action="{{ route('productcomment.save') }}">
                            @csrf
                            <p>
                                @lang('messages.commentDescription'): <input type="text" placeholder="@lang('messages.commentDescription')" name="description" value="{{ old('description') }}" />
                            </p>
                            <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}">
                            <input type="hidden" name="product_id" value='{{$data["product"]->getId()}}'>
                            <input type="submit" value="@lang('messages.save')" />
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
