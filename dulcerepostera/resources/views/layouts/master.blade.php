<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!--Styles -->
    <link rel="shortcut icon" sizes="114x100" href="{{ asset('img/DULCEREPOSTERA.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <b>Dulce Repostera</b>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">       
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('post.show') }}">
                                <b>@lang('messages.posts')</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.list') }}">
                                <b>@lang('messages.products')</b>
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <b>@lang('messages.wishlist')</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <b>@lang('messages.favposts')</b>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('wishlist.show') }}">
                                    <b>@lang('messages.wishlist')</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('favposts.show') }}">
                                    <b>@lang('messages.favposts')</b>
                                </a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.cart') }}">
                                <b>@lang('messages.cart')</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allies.api') }}">
                                <b>@lang('messages.allies')</b>
                            </a>
                        </li>
                    </ul>
                
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b>@lang('messages.language')</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('language.setLanguage','es')}}">
                                    <b>@lang('messages.spanish')</b>
                                </a>
                                <a class="dropdown-item" href="{{ route('language.setLanguage','en')}}">
                                    <b>@lang('messages.english')</b>
                                </a>
                            </div>
                        </li>

                        @guest
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <b>@lang('messages.login')</b>
                                </a>
                            </li>
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <b>@lang('messages.register')</b>
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->getRole()=="admin")
                                        <a class="dropdown-item" href="{{ route('product.create') }}">
                                            <b>@lang('messages.createProduct')</b>
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('post.create') }}">
                                        <b>@lang('messages.createPost')</b>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('order.list') }}">
                                        <b>@lang('messages.myOrders')</b>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <b>@lang('messages.logout')</b>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> 
            </div>    
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</html>