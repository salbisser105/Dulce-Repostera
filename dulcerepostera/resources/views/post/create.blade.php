<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"> @lang('messages.createPost')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('post.save') }}">
                        @csrf

                        <br><input type="text" placeholder="@lang('messages.postName')" name="name" value="{{ old('name') }}" /> </br>
                        <br><textarea name="description" cols="40" rows="5" placeholder="@lang('messages.postDescription')" value="{{ old('description') }}"></textarea></br>
                        <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}">
                        <input type="submit" value="@lang('messages.save')" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection