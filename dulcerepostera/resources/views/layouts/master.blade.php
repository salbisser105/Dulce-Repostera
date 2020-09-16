<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!--Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    Dulce Repostera
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">       
                    <ul class="navbar-nav ml-auto">
                        <a class="nav-link" href="{{ route('post.show') }}">
                            @lang('messages.posts')
                        </a>
                        <a class="nav-link" href="{{ route('product.list') }}">
                            @lang('messages.products')
                        </a>
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">
                                @lang('messages.wishlist')
                            </a>
                            <a class="nav-link" href="{{ route('login') }}">
                                @lang('messages.favposts')
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('wishlist.show') }}">
                                @lang('messages.wishlist')
                            </a>
                            <a class="nav-link" href="{{ route('favposts.show') }}">
                                @lang('messages.favposts')
                            </a>
                        @endguest
                        <a class="nav-link" href="{{ route('product.cart') }}">
                            @lang('messages.cart')
                        </a>
                        <a class="nav-link" href="{{ route('product.removeCart') }}">
                            @lang('messages.removeCart')
                        </a>
                    </ul>
                
                    <!-- <div class="collapse navbar-collapse" id="navbarResponsive"> -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @lang('messages.language')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('language.setLanguage','es')}}">
                                        @lang('messages.spanish')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('language.setLanguage','en')}}">
                                        @lang('messages.english')
                                    </a>
                                </div>
                            </li>

                            @guest
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link" href="{{ route('login') }}">
                                    @lang('messages.login')
                                </a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link" href="{{ route('register') }}">
                                    @lang('messages.register')
                                </a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->getRole()=="admin")
                                            <a class="dropdown-item" href="{{ route('product.create') }}">
                                                @lang('messages.createProduct')
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('post.create') }}">
                                            @lang('messages.createPost')
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            @lang('messages.logout')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    <!-- </div> -->
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