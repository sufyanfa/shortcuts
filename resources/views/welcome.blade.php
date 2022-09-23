@extends('layouts.app')

@section('content')
                <div class="container py-4">
                  <header class="pb-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <img src="{{ asset('/logo.png') }}" width="40" height="40" alt="" loading="lazy">
                      <span class="fs-4" style="font-size: 20px;"> موقع مذكرة الاختصارات </span>
                    </a>
                  </header>
              
                  <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                      <h1 class="display-5 fw-bold">جميع الاختصارات</h1>
                      <p class="col-md-8 fs-4">موقعنا يساعد على نشر الاختصارات , بحيث يتيح للمستخدمين نشر اختصاراتهم و الحصول على اختصارات احترافيه من مستخمين اخرين .</p>
                      <button class="btn btn-primary btn-lg" type="button" onclick="window.location.href='/shortcuts';"><i class="far fa-eye"></i> مشاهدة</button>
                    </div>
                  </div>
              
                  <div class="row align-items-md-stretch">
                    <div class="col-md-6">
                      <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2>تطبيق الاختصارات</h2>
                        <p>حتى تتمكن من الاستفاده من الاختصارات يجب عليك تحميل التطبيق في جهازك اذا لم يسبق لك تحميله .</p>
                        <button class="btn btn-outline-light" type="button" onclick="window.location.href='https://apps.apple.com/ar/app/shortcuts/id915249334';"><i class="far fa-caret-square-down"></i> تحميل</button>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="h-100 p-5 bg-light border rounded-3">
                        <h2> تحتاج مساعدة ؟!</h2>
                        <p>نعلم ان قد تواجهك بعض الصعوبات في استعمال التطبيق , لذلك وفرنا لك شرح مفصل للتطبيق </p>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='https://www.youtube.com/watch?v=tuHhThot6aY';" type="button"><i class="fas fa-eye"></i> عرض</button>
                      </div>
                    </div>
                  </div>
              
                  <footer class="pt-3 mt-4 text-muted border-top">
                    &copy; 2021
                  </footer>
                </div>
@include('includes._footer')
@endsection
