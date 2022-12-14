@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 0;">
    <div class="card" style="width: 100%">
        <div class="media" style="margin: 20px;"> <img style="border-radius: 50%; max-height: 70px;" src="{{ $username->photo_url }}" class="mr-3" height="120">
            <div class="media-body" style="margin-right: 10px">
                <h4 class="mt-1 mb-0">{{ $username->name }}</h4> <span class="text-muted">{{ $username->username }}@</span>
                <p>{{ $username->bio }}</p>
                <a href="{{ $username->url }}">{{ $username->url }}</a>
                @auth
                    @if(Auth::user()->id == $username->id)
                        <p class="pt-1"><a href="/user/{{$username->username}}/edit"><i class="fas fa-edit"></i> {{__('Edit profile')}}</a></p>
                    @endif
                @endauth
            </div>
        </div>
        <!--
        <div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
            <div class="d-flex flex-row align-items-center"><i class="fas fa-suitcase"></i>
                <div class="d-flex flex-row align-items-start ml-3"><span>Upcoming trips</span></div>
            </div>
            <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
        </div>
        <div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3 sample">
            <div class="d-flex flex-row align-items-center"><i class="fas fa-bell preview"></i>
                <div class="d-flex flex-row align-items-start ml-3"><span>Notification settings</span></div>
            </div>
            <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right preview"></i></div>
        </div>
        <div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
            <div class="d-flex flex-row align-items-center"><i class="fas fa-money-bill-wave-alt"></i>
                <div class="d-flex flex-row align-items-start ml-3"><span>Payment history</span></div>
            </div>
            <div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
        </div>
    -->
    </div>
</div>

<div class="container">
    <br>
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">????????????????????</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">??????????????????</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="false">?????????????????? ??????????????</a>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center pt-3">
                @forelse ($shortcuts as $short)
                    <div class="col mb-5">
                        <div class="card h-100" style="border-radius: 10px; background-color: {{ $short->color }}">
                            <div class="card-body "><!--p-4-->
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
                                            
                                            @can('update', $short)
                                                <form class="dropdown-item" action="/shortcuts/{{ $short->id }}/edit" method="get" style="margin-top: 10px; float: right;">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px;"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                                                </form>
                                            @endcan
                                            
                                        </div>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-footer pt-0 border-top-0 bg-transparent"><!--p-4-->
                                <a href="/shortcuts/{{ $short->id }}"><h5 class="fw-bolder text-white text-truncate"> {{ $short->title }} </h5></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col mb-5">
                        <div class="card h-100 bg-warning" style="border-radius: 10px; background-color: ">
                            <div class="card-body">
                                <div class="float-left">
                                    <h1 class="card-title text-info"><i class="fas fa-italic"></i></h1>
                                </div>
                                <div class="float-right">
                                </div>
                            </div>
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <h4 class="card-title"> ???? ???????? ????????????????</a></h4>
                            </div>
                        </div>
                    </div>
                @endforelse
                    @auth
                        @if(Auth::user()->id == $username->id)
                            <div class="col mb-5">
                                <div class="card h-100 bg-light" style="border-radius: 10px; background-color: ">
                                    <div class="card-body p-4">
                                        <div class="float-left">
                                            <h1 class="card-title text-info"><i class="far fa-plus-square"></i></h1>
                                        </div>
                                        <div class="float-right">
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 border-top-0 bg-transparent">
                                        <h4 class="card-title"><a href="/shortcuts/create" class="uk-button uk-button-default btt text-info" uk-toggle="">?????????? ????????????</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center pt-3">
            @forelse ($likes as $like)
                <div class="col mb-5">
                    <div class="card h-100" style="border-radius: 10px; background-color: {{ $like->color }}">
                        <div class="card-body "><!--p-4-->
                            <div class="float-left">
                                <h1 class="card-title text-white"><i class="{{ $like->icon }}"></i><a href="#modal-center" class="uk-button uk-button-default btt text-white" uk-toggle=""></a></h1>
                            </div>
                            <div class="float-right">
                                <h3 class="card-title text-white">
                                    <a class="text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#one"><i class="fas fa-share-square"></i> {{__('Share')}}</a>
                                        
                                        @can('update', $like)
                                            <form class="dropdown-item" action="/shortcuts/{{ $like->id }}/edit" method="get" style="margin-top: 10px; float: right;">
                                                @csrf
                                                <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px;"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                                            </form>
                                        @endcan
                                        
                                    </div>
                                </h3>
                            </div>
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent"><!--p-4-->
                            <a href="/shortcuts/{{ $like->id }}"><h5 class="fw-bolder text-white text-truncate"> {{ $like->title }} </h5></a>
                            <p class="card-text text-white text-truncate" style="font-size: small;">
                                <span class="badge badge-light"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                </svg> {{ $like->user->name }} </span>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col mb-5">
                    <div class="card h-100 bg-warning" style="border-radius: 10px; background-color: ">
                        <div class="card-body">
                            <div class="float-left">
                                <h1 class="card-title text-info"><i class="fas fa-heart-broken"></i></h1>
                            </div>
                            <div class="float-right">
                            </div>
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                            <h4 class="card-title"> ???? ???????? ??????????????</a></h4>
                        </div>
                    </div>
                </div>
            @endforelse
            </div>
        </div>
        <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center pt-3">
            @forelse ($comments as $comment)
            <div class="col mb-5">
                <div class="card h-100" style="border-radius: 10px; background-color: {{ $comment->shortcut->color }}">
                    <div class="card-body "><!--p-4-->
                        <div class="float-left">
                            <h1 class="card-title text-white"><i class="{{ $comment->shortcut->icon }}"></i><a href="#modal-center" class="uk-button uk-button-default btt text-white" uk-toggle=""></a></h1>
                        </div>
                        <div class="float-right">
                            <h3 class="card-title text-white">
                                <a class="text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#one"><i class="fas fa-share-square"></i> {{__('Share')}}</a>
                                    
                                    @can('update', $comment->shortcut)
                                        <form class="dropdown-item" action="/shortcuts/{{ $comment->shortcut->id }}/edit" method="get" style="margin-top: 10px; float: right;">
                                            @csrf
                                            <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px;"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                                        </form>
                                    @endcan
                                    
                                </div>
                            </h3>
                        </div>
                    </div>
                    <div class="card-footer pt-0 border-top-0 bg-transparent"><!--p-4-->
                        <a href="/shortcuts/{{ $comment->shortcut->id }}"><h5 class="fw-bolder text-white"> {{ $comment->shortcut->title }} </h5></a>
                    </div>
                    <div class="card-footer text-white" style=" color: #fff">
                        <a style="color: #fff" href="/shortcuts/{{ $comment->shortcut->id }}"><p><b>{{ $comment->comment }}</b></p></a>
                  </div>
                </div>
            </div>
            @empty
                <div class="col mb-5">
                    <div class="card h-100 bg-warning" style="border-radius: 10px; background-color: ">
                        <div class="card-body">
                            <div class="float-left">
                                <h1 class="card-title text-info"><i class="fas fa-comment-slash"></i></h1>
                            </div>
                            <div class="float-right">
                            </div>
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                            <h4 class="card-title"> ???? ???????? ?????????????? ???? ????????</a></h4>
                        </div>
                    </div>
                </div>
            @endforelse
            </div>
            </div>
        </div>
      </div>
</div>
@include('includes._footer')
@endsection