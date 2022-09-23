<!--Footer-->
<footer class="bg-light text-center h-20" style="position: fixed; left: 0; bottom: 0; width: 100%; color: #070e13; text-align: center; ">
    <div class="text-center pb-1 pt-1" style="background-color: rgb(255, 255, 255, 0.1); border-top: rgb(0, 0, 0, .4);backdrop-filter: blur(10px);">
        
        <a class="btn btn-light px-3 {{ Request::is('shortcuts') ? 'text-primary' : '' }}" href="{{ url('/shortcuts') }}" style="flex-grow: 1; width: 100px;"><h5><h4><i class="fas fa-layer-group"></i></h4> <p class=""><b>الاختصارات</b></p></h5></a>
        
        <a class="btn btn-light px-3 {{ Request::is('search') ? 'text-primary' : '' }}" style="flex-grow: 1; width: 100px;" href="{{ url('/search') }}"><h5><h4><i class="fas fa-search"></i></h4> <p class=""><b>بحث</b></p></h5></a>
        @auth
            <a class="btn btn-light px-3 {{ Request::is('shortcuts/create') ? 'text-primary' : '' }}" style="flex-grow: 1; width: 100px;" href="{{ url('/shortcuts/create') }}"><h5><h4><i class="fas fa-plus"></i></h4> <p class=""><b>إضافة</b></p></h5></a>
        @endauth
    </div>
</footer>
<!--End Footer-->