<!-- Created by: Juan Pablo Leal -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    @include('util.message')
    <div class="row">
        <div class="col-md-8 my-3">
            <div class="card bg-light mb-3 text-center">
                <div class="card-body">
                    <h2 class="card-title" style="color:deeppink">{{ $data["product"]["name"] }}</h2>
                    <img width="300" height="200" src="{{ asset('img/product/'.$data['product']['image']) }}" class="list-picture"><br><br>
                    <b><h5>@lang('messages.productPrice'):</b> {{ $data["product"]["price"] }}</h5><br />
                    <b><h5>@lang('messages.productCategory'):</b></h5> {{ $data["product"]["category"] }}<br /><br>
                    <b><h5>@lang('messages.productDescription'):</b></h5> {{ $data["product"]["description"] }}<br /><br>                
                    <b><h5>@lang('messages.ingredients'):</b></h5> {{ $data["product"]["ingredients"] }}<br /><br>
                    <b><h5>@lang('messages.rating'):</b> {{ $data["product"]["rating"] }}</h5><br />
                    
                    <div class='col-md mt-4 mb-2'>
                        <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="quantity" min="0" style="width: 65px;">
                                </div>
                                <div class="col-md">
                                    <button type="submit" id="button_addCart" class="btn btn-primary" style="color:darkgreen">@lang('messages.add_cart')</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 ml-2">
                                    </div>
                                    <div class="col-md">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @guest
                        @lang('messages.guestWishlist') <a href="{{ route('login') }}">@lang('messages.login')</a>
                    @else
                        <form method="POST" action='{{ route("wishlist.save",$data["product"]->getId()) }}'>
                        @csrf
                            <div>
                                <br><button type="submit" id="button_add" class="btn btn-primary">@lang('messages.addWishlist')</button>
                            </div>
                        </form>
                        @if (Auth::user()->getRole()=="admin")
                            <form method="POST" action='{{ route("product.delete",$data["product"]->getId()) }}'>
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
        <h3 class="card-title" style="color:deeppink">@lang('messages.comments')</h3><br>
        <div class="col-md my-5">
            <div class="row">
            
                @foreach($data["product"]->comments as $comment)
                
                <div class="row">
                    <div class="card bg-light mb-3 text-center">
                        <div class="card-body">
                            <br/>{{ $comment->getDescription() }} - @lang('messages.rating'): {{ $comment->getRating() }}
                            @guest
                            @else
                                @if (Auth::user()->getId()==$comment->getUserId())
                                    <form method="POST" action='{{ route("productcomment.delete",$comment->getId()) }}'>
                                        @csrf
                                        <div>
                                            <button type="submit" id="button_delete" class="btn btn-primary">@lang('messages.delete')</button>
                                        </div>
                                    </form>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="card bg-light mb-3 text-center">
                    <div class="card-body">
                        <br><h5><b>@lang('messages.createComment'):</b></h5>
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
                                <br><br><h5><b> @lang('messages.rating'):</b></h5>
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
                                <input type="submit" value="@lang('messages.save')" id="button_add" class="btn btn-primary">
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection