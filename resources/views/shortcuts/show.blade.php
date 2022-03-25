@extends('layouts.app')

@section('content')
<div class="container">
    <!--card show shortcat-->
    <div class="card">
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
            {{--@if(Auth::check())--}}
            @can('update', $shortcut)
            {{--@if (Auth::user()->id == $shortcut->user->id)--}}
            
            <div style="display: inline">
              <form action="/shortcuts/{{ $shortcut->id }}" method="post" style="margin-top: 10px; float: left;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" style="width: 100px;"> {{__('Delete')}} <i class="fas fa-trash"></i></button>
              </form>
            @endcan
            @can('delete', $shortcut)
            
              <form action="/shortcuts/{{ $shortcut->id }}/edit" method="get" style="margin-top: 10px; float: right;">
                @csrf
                <button type="submit" class="btn btn-outline-dark" style="width: 100px;"> {{__('Edit')}} <i class="far fa-edit"></i></button>
              </form>
            </div>
          
            @endcan
            {{--@endif--}}
            {{--@endif--}}
          </div>
        </div>
      </div>
      <!--End card show shortcat-->
    <br>


      <div class="card">
        <div class="media" style="margin: 20px;"> <img style="border-radius: 50%" src="{{ $shortcut->user->photo_url }}" class="mr-3" height="50">
          <div class="media-body" style="margin-right: 10px; weidth:10px">
              <h6 class="mt-1 mb-0">{{ $shortcut->user->name }}</h6> <span class="text-muted">{{ $shortcut->user->username }}@</span>
          </div>
          <h1><a href="/user/{{ $shortcut->user->username }}" style="color: #212529"><i class="fas fa-id-badge"></a></i></h1>
        </div>
      </div>
<br>

<div class="card">
    <section>
      @foreach ($shortcut->comments as $comment)
            <div class="media" style="margin: 20px;"> <img style="border-radius: 50%" src="{{ $comment->user->photo_url }}" class="mr-3" height="50">
              <div class="media-body" style="margin-right: 10px">
              <div class="float-right">
                                <h3 class="card-title ">
                                    <a class="" style="color: #212529" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        {{--@can('update', $short)--}}
                                            <form class="dropdown-item" action="/comments/{{ $comment->id }}/edit" method="get" style="">
                                                @csrf
                                                <button class="dropdown-item" type="submit" class="btn btn-outline-dark" style="width: 100px; font-siz:100px"> {{__('Edit')}} <i class="far fa-edit"></i></button>
                                            </form>
                                       {{-- @endcan--}}
                                        
                                    </div>
                                </h3>
                    </div>
                  <h6 class="mt-1 mb-0">{{ $comment->user->name }}</h6> <span class="text-muted">{{ $comment->user->username }}@</span>
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
                      <textarea class="form-control" id="textAreaExample" name="comment" rows="4">{{__('Comment ..')}}</textarea>
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

</div>
@endsection