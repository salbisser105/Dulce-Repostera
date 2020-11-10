<!-- Created by: Ricardo Saldarriaga -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-20">
            <div class="card">
                <h5 class="card-header" style="color: deeppink;" style="text-align: center;">Edit</h5>
                <div class="card-body">
                    @guest
                        @lang('messages.notAccess')<a href="{{ route('home.index') }}">Dulce Repostera</a>
                    @else
                        @if (Auth::user()->getId()==$data['user']['id'] || Auth::user()->getRole()=="admin")
                            <form method="POST" action="{{ route('user.saveEdit') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="user" class="col-md-4 col-form-label text-md-right">@lang('messages.user')</label>

                                    <div class="col-md-6">
                                        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $data['user']['user'] }}" required autocomplete="user" autofocus>

                                        @error('user')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">@lang('messages.name')</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['user']['name'] }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['user']['email'] }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('messages.password')</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('messages.confirmpassword')</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="{{$data['user']['id']}}">

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" id="button_register" class="btn btn-primary">
                                            <b>@lang('messages.edit')</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            @lang('messages.notAccess') <a href="{{ route('home.index') }}">Dulce Repostera</a>
                        @endif    
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
