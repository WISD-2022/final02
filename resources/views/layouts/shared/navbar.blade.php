<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">民宿訂房</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
{{--        <a class="navbar-brand" href="{{ route('rooms.search') }}">民宿訂房</a>--}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{route('rooms.search')}}" name="name" method="GET" >
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="搜尋房間" aria-label="Search for..."
                           aria-describedby="btnNavbarSearch" name="search1"/>
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit" ><i class="fas fa-search"></i></button>
                </div>
            </form>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::guest())<!--未登入-->
                    <li class="nav-item"><a class="nav-link{{ (request()->is('login'))? " active" : "" }}" aria-current="page" href="{{ route('login') }}">登入</a></li>
                    <li class="nav-item"><a class="nav-link{{ (request()->is('register'))? " active" : "" }}" aria-current="page" href="{{ route('register') }}">註冊</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('logout') }}">登出</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
