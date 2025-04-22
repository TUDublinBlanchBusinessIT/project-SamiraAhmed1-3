<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #fffaf0;
        }

        #sidebarToggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1030;
        }

        #sidebar {
            width: 250px;
            background-color: #fef6e4;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.3s ease;
            z-index: 1029;
            padding-top: 60px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        #sidebar a {
            display: block;
            padding: 10px 20px;
            color: #333;
            font-weight: bold;
            text-decoration: none;
        }

        #sidebar a:hover {
            color: #e26d5c;
        }
    </style>
</head>
<body>
    <!-- Hamburger Button -->
    <button id="sidebarToggle" class="btn btn-outline-dark">&#9776;</button>

    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="list-unstyled">
            <li><a href="{{ route('shop') }}">🧵 All Yarn</a></li>
            <li><a href="{{ route('shop.wool') }}">🧶 Wool</a></li>
            <li><a href="#">🌾 Cotton</a></li>
            <li><a href="#">💧 Acrylic</a></li>
            <li><a href="#">🪡 Knitting Needles</a></li>
            <li><a href="#">🧵 Crochet Hooks</a></li>
        </ul>
    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Dancing Script', cursive; font-size: 1.8rem;">
                    {{ config('app.name', 'Knit & Knot') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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

    <!-- Bootstrap & JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.style.left = (sidebar.style.left === '0px') ? '-250px' : '0px';
        });
    </script>
</body>
</html>
