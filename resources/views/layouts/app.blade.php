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
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav-scroller .nav-link {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: .875rem;
        }

    </style>
</head>
<body>
    <div id="app">
        <!--
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
                <div class="nav-item dropdown navbar-nav ml-auto">
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
        </nav>-->

        <!-- test nav -->
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                  <div class="col-4">
                    <img src="{{ asset('/logo.png') }}" width="40" height="40" alt="" loading="lazy">
                  </div>
                  <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark navbar-brand" href="/">الاختصارات</a>
                  </div>
                  <div class="col-4 d-flex justify-content-end align-items-center">
                    @auth
                    <div class="dropdown">
                        <a class="text-muted" href="#" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="/user/{{ Auth::user()->username }}">
                                <i class="fas fa-id-badge"></i>
                                اشعار
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="border-radius: 50%" src="{{ Auth::user()->photo_url }}" width="30" height="30" alt="user_logo">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                    @else
                    <div class="dropdown">
                        <a class="btn" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h4><i class="fas fa-user-cog"></i></h4>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <a style="display:inline-flex" class="dropdown-item" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>  دخول  </a>
                            
                            @if (Route::has('register'))
                                <a style="display:inline-flex" class="dropdown-item" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>  تسجيل  </a>
                            @endif
                        </div>
                    </div>
                        
                    @endauth
                  </div>
                </div>
            </header>

        </div>
        <!-- end test nav -->

        <main class="py-4">
            @yield('content')
        </main>
        <br><br><br><br><br>
    </div>
    <!--Footer-->
    <footer class="bg-light text-center h-20" style="position: fixed; left: 0; bottom: 0; width: 100%; color: #070e13; text-align: center; ">
        <div class="text-center pb-5 pt-1" style="background-color: rgb(255, 255, 255, 0.1); border-top: rgb(0, 0, 0, .4);backdrop-filter: blur(10px);">
            
            <a class="btn btn-light px-3 {{ Request::is('shortcuts') ? 'text-primary' : '' }}" href="{{ url('/shortcuts') }}" style="flex-grow: 1; width: 100px;"><h5><h4><i class="fas fa-layer-group"></i></h4> <p class=""><b>الاختصارات</b></p></h5></a>
            
            <a class="btn btn-light px-3 {{ Request::is('search') ? 'text-primary' : '' }}" style="flex-grow: 1; width: 100px;" href="{{ url('/search') }}"><h5><h4><i class="fas fa-search"></i></h4> <p class=""><b>بحث</b></p></h5></a>
            @auth
                <a class="btn btn-light px-3 {{ Request::is('shortcuts/create') ? 'text-primary' : '' }}" style="flex-grow: 1; width: 100px;" href="{{ url('/shortcuts/create') }}"><h5><h4><i class="fas fa-plus"></i></h4> <p class=""><b>إضافة</b></p></h5></a>
            @endauth
        </div>
    </footer>
    
    <!--End Footer-->
</body>
</html>
