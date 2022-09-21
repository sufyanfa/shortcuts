<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('logo.png') }}" sizes="192x192" rel="icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('Shortcuts')}}</title>

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
                    {{__('Shortcuts')}}
                </a>
                @guest
                <div class="navbar-nav ml-auto d-flex">
                    <a style="display:inline-flex" class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a> 
                    @if (Route::has('register'))
                        <a style="display:inline-flex" class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                    @endif
                </div>
                @else
                <div class="nav-item dropdown navbar-nav ml-auto dropdown-menu-lg-right">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img style="border-radius: 50%" src="{{ Auth::user()->photo_url }}" width="30" height="30" alt="user_logo">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/user/{{ Auth::user()->username }}">
                            <i class="fas fa-id-badge"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <a class="dropdown-item" style="color: red" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <br><br><br><br><br>
    </div>
    <!--Footer-->
    <footer class="bg-light text-center h-20" style="position: fixed; left: 0; bottom: 0; width: 100%; color: #070e13; text-align: center; ">
        <div class="text-center pb-5 pt-1" style="background-color: rgb(255, 255, 255, 0.1); border-top: rgb(0, 0, 0, .4);backdrop-filter: blur(10px);">
            
            <a class="btn btn-light px-3 {{ Request::is('shortcuts') ? 'text-primary' : '' }}" href="{{ url('/shortcuts') }}" style="flex-grow: 1;"><h5><h4><i class="fas fa-layer-group"></i></h4> <p class=""><b>الاختصارات</b></p></h5></a>
            
            <a class="btn btn-light px-3 {{ Request::is('search') ? 'text-primary' : '' }}" style="flex-grow: 1;" href="{{ url('/search') }}"><h5><h4><i class="fas fa-search"></i></h4> <p class=""><b>بحث</b></p></h5></a>
            @auth
                <a class="btn btn-light px-3 {{ Request::is('shortcuts/create') ? 'text-primary' : '' }}" style="flex-grow: 1;" href="{{ url('/shortcuts/create') }}"><h5><h4><i class="fas fa-plus-square"></i></h4> <p class=""><b>إضافة</b></p></h5></a>
            @endauth
        </div>
    </footer>
    
    <!--End Footer-->
</body>
</html>
