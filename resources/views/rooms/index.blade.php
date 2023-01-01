@extends('rooms.layouts.master')

@section('page-title', '民宿管理')
{{--跳出視窗--}}
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">民宿管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">房間管理</li>
    </ol>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('rooms.create') }}">新增</a>
    </div>
    <section class="pt-4">
        <div class="container px-lg-5">
            <div class="row gx-lg-5">
                <div class="col-lg-1 col-xxl-1 mb-5">房號</div>
                <div class="col-lg-4 col-xxl-4 mb-5">介紹</div>
                <div class="col-lg-2 col-xxl-2 mb-5">上架狀態</div>
                <div class="col-lg-2 col-xxl-2 mb-5">可住人數</div>
                <div class="col-lg-1 col-xxl-1 mb-5">金額</div>
                <div class="col-lg-2 col-xxl-2 mb-5">操作</div>
            </div>

        <!-- Main Content -->
        @foreach($rooms as $key => $room)
        <div class="row gx-lg-5">
            <div class="col-lg-1 col-xxl-1 mb-5">{{$room->id}}</div>
            <div class="col-lg-4 col-xxl-4 mb-5">{{$room->introduce}}</div>
            <div class="col-lg-2 col-xxl-2 mb-5">{{($room->shelf_status)? '開放訂購' : '整理中'}}</div>
            <div class="col-lg-2 col-xxl-2 mb-5">{{ $room->people }}</div>
            <div class="col-lg-1 col-xxl-1 mb-5">{{ $room->amount }}</div>
            <div class="col-lg-2 col-xxl-2 mb-5">
                <a class="btn btn-sm btn-primary" href="{{ route('rooms.edit', $room->id) }}">編輯</a>
{{--                <a href="{{ route('rooms.edit', $room->id) }}">編輯</a>--}}
                /
                <form action="{{route('rooms.destroy', $room->id)}}" method="POST" style="display: inline-block">
                    @method('DELETE')
                    @csrf
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                </form>
{{--                <a href="#">刪除</a>--}}
            </div>
        </div>
        @endforeach
        </div>
    </section>
{{--    <section class="pt-4">--}}
{{--        <div class="container px-lg-5">--}}
{{--            <!-- Page Features-->--}}
{{--            <div class="row gx-lg-5">--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間A</h2>--}}
{{--                            <p class="mb-0">房間A</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間B</h2>--}}
{{--                            <p class="mb-0">房間B</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間C</h2>--}}
{{--                            <p class="mb-0">房間C</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間D</h2>--}}
{{--                            <p class="mb-0">房間D</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間E</h2>--}}
{{--                            <p class="mb-0">房間E</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xxl-4 mb-5">--}}
{{--                    <div class="card bg-light border-0 h-100">--}}
{{--                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">--}}

{{--                            <h2 class="fs-4 fw-bold">房間F</h2>--}}
{{--                            <p class="mb-0">房間F</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
</div>
@endsection
