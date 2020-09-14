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

                    <img width="300" height="200" src='/img/product/{{ $data["product"]["image"] }}' class="list-picture"><br />
                    <b>@lang('messages.productName'):</b> {{ $data["product"]["name"] }}<br />
                    <b>@lang('messages.productPrice'):</b> {{ $data["product"]["price"] }}<br />
                    <b>@lang('messages.productCategory'):</b> {{ $data["product"]["category"] }}<br />
                    <b>@lang('messages.productDescription'):</b> {{ $data["product"]["description"] }}<br />
                    <b>@lang('messages.ingredients'):</b> {{ $data["product"]["ingredients"] }}<br />                    
                    <b>Rating:</b> {{ $data["product"]["rating"] }}<br />                    
                    <form method="POST" action='{{ route("wishlist.save",$data["product"]->getId()) }}'>                  
                    @csrf
                        <div>
                            <button type="submit">Add to WishList</button>
                        </div>
                    </form>
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
                            <input type="radio" name="rating" value="1">
                            <label for="radio-inline">1</label><br>
                            <input type="radio" name="rating" value="2">
                            <label for="radio-inline">2</label><br>
                            <input type="radio" name="rating" value="3">
                            <label for="radio-inline">3</label><br>
                            <input type="radio" name="rating" value="4">
                            <label for="radio-inline">4</label><br>
                            <input type="radio" name="rating" value="5">
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
    <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-12">Qtt:
                <input type="number" class="form-control" name="quantity" min="0" style="width: 80px;">
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-outline-success">Add</button>
            </div>
        </div>
    </form>
</div>
@endsection