@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="text-align: center;">
        <div class="container">
        <h1 class="display-4">{{__('Search')}}</h1>
        <p class="lead text-info">{{__('Find a shortcut')}} !</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" action="{{ route('search') }}" method="GET">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="{{__('Search topics or keywords')}}">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-search"></i> {{__('Search')}}</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>
    <br>
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">الاشهر</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div>
    <hr>
    @if($shortcuts->isNotEmpty())
        
            <div class="post-list">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($shortcuts as $short)
                        <div class="col mb-5">
                            <div class="card h-100" style="border-radius: 10px; background-color: {{ $short->color }}">
                                <div class="card-body">
                                    <div class="float-left">
                                        <h1 class="card-title text-white"><i class="{{ $short->icon }}"></i><a href="#modal-center" class="uk-button uk-button-default btt text-white" uk-toggle=""></a></h1>
                                    </div>
                                    <div class="float-right">
                                        <h3 class="card-title text-white">
                                            <a class="text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#one"><i class="fas fa-share-square"></i> {{__('Share')}}</a>
                                                @auth
                                                    @if (Auth::user()->id == $short->user->id)
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#three"><i class="far fa-edit"></i> {{__('Edit')}}</a>
                                                    @endif
                                                @endauth
                                              </div>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 border-top-0 bg-transparent">
                                    <a href="/shortcuts/{{ $short->id }}"><h5 class="fw-bolder text-white"> {{ $short->title }} </h5></a>
                                    <p class="card-text text-white" style="font-size: small;">
                                        <span class="badge badge-light"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                        </svg> {{ $short->user->name }} </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        
    @else 
    <div style="text-align: center">
        <h2>لم نعثر على "{{$search}}"</h2>
    </div>
@endif
</div>
@endsection
