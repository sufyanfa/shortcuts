@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5">
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
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <a href="/shortcuts/{{ $short->id }}"><h5 class="fw-bolder text-white"> {{ $short->title }} </h5></a>
                            <p class="card-text text-white" style="font-size: small;">
                                <span class="badge badge-light"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                </svg> {{ $short->user->name }} </span>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse

        </div>
    </div>
</section>

@endsection
