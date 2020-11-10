<!-- Created by: Santiago Albisser -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
                @lang('messages.notAccess')<a href="{{ route('home.index') }}">Dulce Repostera</a>
            @else
                @if (Auth::user()->getRole()=="admin")
                    @foreach($data["user"] as $user)
                        <div class="card bg-light mb-3 text-center">
                            <div class="card-body">
                                <h5 class="card-title" style="color:deeppink">{{ $user->getId() }}.{{ $user->getUser() }}:{{ $user->getName() }}</h5>
                                <a href="{{ route('user.edit',$user->getId()) }}" id="button_go" class="btn btn-primary">@lang('messages.edit')</messagges></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    @lang('messages.notAccess')<a href="{{ route('home.index') }}">Dulce Repostera</a>
                @endif
            @endguest    
        </div>
    </div>
</div>
@endsection