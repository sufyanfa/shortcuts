@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 0;">
    <div class="card" style="width: 100%">
        <div class="media" style="margin: 20px;"> <img style="border-radius: 50%" src="{{ $username->photo_url }}" class="mr-3" height="120">
            <div class="media-body" style="margin-right: 10px">
                <h4 class="mt-1 mb-0">{{ $username->name }}</h4> <span class="text-muted">{{ $username->username }}@</span>
                <p>{{ $username->bio }}</p>
                <a href="{{ $username->url }}">{{ $username->url }}</a>
                @auth
                    @if(Auth::user()->id == $username->id)
                        <p class="pt-1"><a href=""><i class="fas fa-edit"></i> {{__('Edit profile')}}</a></p>
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
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Shortcuts')}}</a>
        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Likes')}}</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container px-4 px-lg-5 mt-3">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @forelse ($shortcuts as $short)
                        <div class="col mb-5">
                            <div class="card h-100" style="border-radius: 10px; background-color: {{ $short->color }}">
                                <div class="card-body p-4">
                                    <div class="float-left">
                                        <h1 class="card-title text-white"><i class="{{ $short->icon }}"></i><a href="#modal-center" class="uk-button uk-button-default btt text-white" uk-toggle=""></a></h1>
                                    </div>
                                    <div class="float-right">
                                        <h3 class="card-title text-white">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <h5 class="fw-bolder text-white"> {{ $short->title }} </h5>
                                    <p class="card-text text-white" style="font-size: small;">
                                        <span class="badge badge-light"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                        </svg> {{ $short->user->name }} </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{__('This user does not have any shortcuts.')}}
                    @endforelse
                </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

        </div>
    </div>
</div>
@endsection