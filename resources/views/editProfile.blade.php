@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="text-align: center;">
        <div class="container">
        <h1 class="display-4">تعديل الملف الشخصي</h1>
        <p class="lead text-info">تعديل المعلومات الشخصيه !</p>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-1">
                        <div class="card-header">
                            <h5 class="mb-0">انشاء</h5>
                        </div>
                        <div class="card-body">
                            {{$user}}
                                <form class="form" action="/user/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label> الاسم: </label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="name" :value="{{ old('name') }}" value="{{ $user->name }}" name="title">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                    <input class="btn btn-success btn-md float-right" type="submit" value="تحديث !">
                                </form>
                            {{--
                            <a href="/login">يجب عليك تسجيل الدخول لاضافة اختصار</a>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection