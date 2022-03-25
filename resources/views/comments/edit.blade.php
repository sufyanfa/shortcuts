@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="text-align: center;">
        <div class="container">
          <h1 class="display-4">{{__('Edit Comment')}}</h1>
          <p class="lead text-info">{{__('Chening your Comment')}}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="/comments/{{ $comment->id }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-outline">
                            <textarea class="form-control" id="textAreaExample" name="comment" rows="4">{{$comment->comment}}</textarea>
                        </div>

                        
                        <br>
                        <div class="">
                            <div class="">
                                <button type="submit" style="width: 100%;" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="/comments/{{ $comment->id }}" method="post" style="margin-top: 10px; ">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" style="width: 100%;"> حذف <i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection