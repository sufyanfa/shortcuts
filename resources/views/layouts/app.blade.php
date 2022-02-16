<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
@if(config('app.locale') == 'ar')
    dir="rtl"
@else
    dir="ltr"
@endif
    >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('logo.png') }}" sizes="192x192" rel="icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shortcuts') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts && icons -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    
    

    <!-- Styles -->
    @if(config('app.locale') == 'ar')

    <!--
        <link 
    rel="stylesheet"
    href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
    integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
    crossorigin="anonymous" />
    -->
    
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <style type="text/css">
        html {
            font-size: 14px;
        }

        .container {
            max-width: 960px;
        }
        select {
            font-family: 'FontAwesome', 'sans-serif';
        }

        .form-control-borderless {
            border: none;
        }

        .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{ asset('/logo.png') }}" width="40" height="40" alt="" loading="lazy">
                <a class="navbar-brand" href="{{ url('/') }}" style="margin-right: 3px">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('shortcuts') ? 'active' : '' }}" href="{{ url('/shortcuts') }}"><i class="fas fa-layer-group"></i> {{__('Shortcuts')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('search') ? 'active' : '' }}" href="{{ url('/search') }}"><i class="fas fa-search"></i> {{__('Search')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-language"></i>
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                @endif
                            @endforeach
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img style="border-radius: 50%" src="{{ Auth::user()->photo_url }}" width="30" height="30" alt="user_logo">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/shortcuts/create') }}">
                                        <i class="fas fa-plus-square"></i> 
                                        {{ __('Add') }}
                                    </a>
                                    <a class="dropdown-item" href="/user/{{ Auth::user()->username }}">
                                        <i class="fas fa-id-badge"></i>
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
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
        <br><br>
    </div>
    <!--Footer-->
    <footer class="bg-light text-center text-white" style="  position: fixed; left: 0; bottom: 0; width: 100%; background-color: red; color: white; text-align: center;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © برمجة وتطوير :
          <a class="text-white" href="https://twitter.com/a7sa45">عبدالهادي ال بوسنينة</a>
        </div>
    </footer>
    <!--End Footer-->
</body>
</html>
