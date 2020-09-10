@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.dashboard')</div>
                <div class="card-body">
                    Dulce Repostera
                    @guest
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <br><iframe width="680" height="480" src="https://www.youtube.com/embed/z5CmxGtfq9s?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowautoplay></iframe>
                        @endif
                    @endguest

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection