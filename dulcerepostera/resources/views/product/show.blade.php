@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]["name"] }}</div>
                <div class="card-body">
                    <b>Product name:</b> {{ $data["product"]["name"] }}<br />
                    <b>Product price:</b> {{ $data["product"]["price"] }}<br />
                    @guest
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <form method="POST" action='{{ route("product.delete",$data["product"]->getId()) }}'>
                                @csrf
                                <div>
                                    <button type="submit">Delete Product</button>
                                </div>
                            </form>
                        @endif
                    @endguest

                    <b>Comments:<br/></b>
                    @foreach($data["product"]->comments as $comment)
                        - {{ $comment->getDescription() }}
                        @guest
                        @else
                            @if (Auth::user()->getId()==$comment->getUserId())
                                <form method="POST" action='{{ route("productcomment.delete",$comment->getId()) }}'>
                                    @csrf
                                    <div>
                                        <button type="submit">Delete Comment</button>
                                    </div>
                                </form>
                            @endif
                        @endguest
                    @endforeach


                    <br><b>Create Comment:</b>
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @guest
                        To create a comment <a href="{{ route('login') }}">Login</a>
                    @else
                        <form method="POST" action="{{ route('productcomment.save') }}">
                            @csrf
                            <br><p>
                                Comment: <input type="text" placeholder="Insert Description" name="description" value="{{ old('description') }}" />
                            </p>
                            <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}">
                            <input type="hidden" name="product_id" value='{{$data["product"]->getId()}}'>
                            <input type="submit" value="Create" />
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection