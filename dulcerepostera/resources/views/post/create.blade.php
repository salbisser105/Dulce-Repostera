@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create post</div>
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
                        <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" placeholder="Description" name="description" value="{{ old('description') }}" />
                        <input type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection