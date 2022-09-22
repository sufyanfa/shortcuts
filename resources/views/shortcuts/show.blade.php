@extends('layouts.app')

@section('content')
<div class="container">
    <!--card show shortcat-->
    <div class="card">
      <!--card header-->
      <div class="card" style="border-top: 0; border-left: 0; border-right: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
        <div class="media" style="margin: 20px;"> <img style="border-radius: 50%" src="{{ $shortcut->user->photo_url }}" class="mr-3" height="50">
          <div class="media-body" style="margin-right: 10px; weidth:10px">
              <a style="color: #212529" href="/user/{{ $shortcut->user->username }}">
              <h6 class="mt-1 mb-0">{{ $shortcut->user->name }}</h6></a> <span class="text-muted">{{ $shortcut->user->username }}@</span>
          </div>
          <h3 class="card-title text-white" style="color: #212529">
            <a class="text-white" style="color: #212529" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i style="color: #212529" class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#one"><i class="fas fa-share-square"></i> {{__('Share')}}</a>
                
                @can('update', $shortcut)
                    <form class="dropdown-item" action="/shortcuts/{{ $shortcut->id }}/edit" method="get" style="margin-top: 10px; float: right;">
                        @csrf
                        <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px;"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                    </form>
                @endcan
                @can('update', $shortcut)
                <form class="dropdown-item" action="/shortcuts/{{ $shortcut->id }}" method="post" style="margin-top: 10px;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item btn-outline-danger" style="width: 100px; color: red"> {{__('Delete')}} <i class="fas fa-trash"></i></button>
                </form>
                @endcan
            </div>
          </h3>
          
        </div>
      </div>
        <div class="card-body">
          <div class="card text-white text-center p-3" style="background-color: {{ $shortcut->color }};">
            <blockquote class="blockquote mb-0">
              <h1 class="card-title text-white"><i class="fab {{ $shortcut->icon }}"></i></h1>
                <h2>{{ $shortcut->title }}</h2>
              <footer class="blockquote-footer text-white">
                <p>{{ $shortcut->body }}</p>
              </footer>
            </blockquote>
            <button style="font-size: 24px" onclick="window.location.href='{{ $shortcut->url }}';" type="button" class="btn btn-outline-light"><i class="fas fa-cloud-download-alt"></i> تحميل </button>
          </div>
          @auth
          <div style="display: inline">
            <div style="margin-top: 10px; float: left;">
              @if(!$shortcut->liked())
                <form action="{{ route('like.short', $shortcut->id) }}"
                  method="post">
                  @csrf
                  <button
                      class="{{ $shortcut->liked() ? 'btn text-danger btn-lg' : 'btn text-dark btn-lg' }}">
                      <i class="{{ $shortcut->liked() ? 'fas fa-heart' : 'far fa-heart' }}"></i></a> {{ $shortcut->likeCount }}
                  </button>
                </form>
              @else
                <form action="{{ route('unlike.short', $shortcut->id) }}"
                  method="post">
                  @csrf
                  <button
                      class="btn text-danger btn-lg">
                      <i class="{{ $shortcut->liked() ? 'fas fa-heart' : 'far fa-heart' }}"></i></a> {{ $shortcut->likeCount }}
                  </button>
                </form>
              @endif
            </div>
            <div style="margin-top: 10px; float: right;">
              <a type="submit" class="btn text-dark btn-lg" style="border:0"><i class="fab fa-font-awesome-flag"></i></a>
            </div>
          </div>
          @endauth
        </div>
        
      </div>
      <!--End card show shortcat-->
    <br>

      
<br>

<div class="card">
    <section>
      @foreach ($shortcut->comments as $comment)
            <div class="media" style="margin: 20px;"> <img style="border-radius: 50%" src="{{ $comment->user->photo_url }}" class="mr-3" height="50">
              <div class="media-body" style="margin-right: 10px">
              <div class="float-right">
                                <h3 class="card-title ">
                                    @if(Auth::user()->id == $comment->user->id)
                                      <a class="" style="color: #212529" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </a>
                                      <div class="dropdown-menu">
                                        <form class="dropdown-item" action="/comments/{{ $comment->id }}/edit" method="get" style="">
                                          @csrf
                                          <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px; font-siz:100px"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                                        </form>
                                      </div>
                                    @endif
                                </h3>
                    </div>
                    <a style="color: #212529" href="/user/{{ $comment->user->username }}"><h6 class="mt-1 mb-0">{{ $comment->user->name }}</h6></a> <span class="text-muted">{{ $comment->user->username }}@</span>
                  <p>{{ $comment->comment }}</p>
              </div>
            </div>
            @endforeach
      @if(Auth::check())
        <div class="">
          <div class="card" style="border-color: white">
            <div class="card-body" style="width: 100%">
              <div class="d-flex flex-start w-100">
                <img
                  class="rounded-circle shadow-1-strong me-3" 
                  style="margin: 7px"
                  src="{{ Auth::user()->photo_url }}"
                  alt="avatar"
                  width="50"
                  height="50"
                />
                <div class="w-100">
                  <h5>{{__('Add a comment')}}</h5>
                  <form action="/comments" method="post">
                    @csrf
                    <div class="form-outline">
                      <textarea class="form-control" id="textAreaExample" placeholder="إضف تعليق..." name="comment" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="shortcut_id" value="{{ $shortcut->id }}">
                    <div class="d-flex justify-content-between mt-3">
                      <button type="submit" class="btn btn-outline-info">
                        {{__('Send')}} <i class="fas fa-paper-plane"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>  
      @else
          <div class="card" style="text-align: center; padding: 6px">
            <p style="padding-top: 3px">{{__('To write a comment you need ')}}<a href="/login">{{__('Log in')}}</a> {{__('OR')}} <a href="/register">{{__('Register')}}</a></p>
          </div>
      @endif
        
    </section>
  </div>

  <br><br><br>
</div>
@endsection