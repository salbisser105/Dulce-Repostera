<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ $data["product"]["name"] }}</div>
                <div class="card-body">
                    <img width="300" height="200" src="{{ asset('img/product/'.$data['product']['image']) }}" class="list-picture"><br />
                    <b>@lang('messages.productName'):</b> {{ $data["product"]["name"] }}<br />
                    <b>@lang('messages.productPrice'):</b> {{ $data["product"]["price"] }}<br />
                    <b>@lang('messages.productCategory'):</b> {{ $data["product"]["category"] }}<br />
                    <b>@lang('messages.productDescription'):</b> {{ $data["product"]["description"] }}<br />                  
                    <b>@lang('messages.ingredients'):</b> {{ $data["product"]["ingredients"] }}<br />
                    <b>@lang('messages.rating'):</b> {{ $data["product"]["rating"] }}<br />
                    
                    @guest
                        @lang('messages.guestWishlist') <a href="{{ route('login') }}">@lang('messages.login')</a>
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <form method="POST" action='{{ route("product.delete",$data["product"]->getId()) }}'>
                                @csrf
                                <div>
                                    <button type="submit">@lang('messages.delete')</button>
                                </div>
                            </form>
                        @endif
                        <form method="POST" action='{{ route("wishlist.save",$data["product"]->getId()) }}'>
                        @csrf
                            <div>
                                <button type="submit">@lang('messages.addWishlist')</button>
                            </div>
                        </form>
                    @endguest

                    <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">@lang('messages.quantity'):
                                <input type="number" class="form-control" name="quantity" min="0" style="width: 65px;">
                            </div>

                            <div class="form-group col-md-12">
                                  <button type="submit" >@lang('messages.add')</button><!-- class="btn btn-outline-success" -->
                            </div>
                        </div>
                    </form>

                    <b>@lang('messages.comments'):</b>
                    @foreach($data["product"]->comments as $comment)

                        <br/>- {{ $comment->getDescription() }} : Rating: {{ $comment->getRating() }}
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
                            @lang('messages.commentDescription'): <input type="text" placeholder="@lang('messages.commentDescription')" name="description" value="{{ old('description') }}" />
                            <br><b> Puntuacion:</b> <br>
                            <input type="radio" name="rating" value="1" {{ (old('rating') == "1") ? "checked" : ""}}>
                            <label for="radio-inline">1</label><br>
                            <input type="radio" name="rating" value="2" {{ (old('rating') == "2") ? "checked" : ""}}>
                            <label for="radio-inline">2</label><br>
                            <input type="radio" name="rating" value="3" {{ (old('rating') == "3") ? "checked" : ""}}>
                            <label for="radio-inline">3</label><br>
                            <input type="radio" name="rating" value="4" {{ (old('rating') == "4") ? "checked" : ""}}>
                            <label for="radio-inline">4</label><br>
                            <input type="radio" name="rating" value="5" {{ (old('rating') == "5") ? "checked" : ""}}>
                            <label for="radio-inline">5</label><br>

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