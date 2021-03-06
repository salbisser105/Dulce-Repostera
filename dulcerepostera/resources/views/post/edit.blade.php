<!-- Created by: Ricardo Saldarriaga -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="color: deeppink; text-align:center;"> @lang('messages.editPost')</h2>
                    @guest
                        @lang('messages.guestCreatePost')<a href="{{ route('login') }}">@lang('messages.login')</a>
                    @else
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form method="POST" action="{{ route('post.saveEdit') }}">
                            @csrf
                        <br><b>@lang('messages.postTitle'): </b><input type="text" placeholder="@lang('messages.postName')" name="name" value="{{ $data['post']['name'] }}" /> </br>
                        <br><b>@lang('messages.postDescription'): </b><br><textarea name="description" cols="40" rows="5" placeholder="@lang('messages.postDescription')" value="">{{{$data['post']['description']}}}</textarea></br>
                        <input type="hidden" name="user_id" value="{{$data['post']['user_id']}}">
                        <input type="hidden" name="id" value="{{$data['post']['id']}}">
                        <input type="submit" id="button_save" class="btn btn-primary" value="@lang('messages.edit')" />
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection