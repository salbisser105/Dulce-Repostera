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
                <a class="navbar-brand" href="{{ route('post.show') }}">
                   Posts
                </a>
                <a class="navbar-brand" href="{{ route('product.list') }}">
                    Products
                </a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item mx-0 mx-lg-1"><a class="" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a></li>
                        @else
                        @if (Auth::user()->getRole()=="admin")
                            <li><a class="navbar-brand" href="{{ route('product.create') }}">
                                Create Product
                            </a></li>
                        @endif
                        <a class="navbar-brand" href="{{ route('post.create') }}">
                            Create Post
                        </a>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

