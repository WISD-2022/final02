@extends('layouts.master')

@section('page-title', '訂單紀錄')

@section('page-style')
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/home-styles.css') }}" rel="stylesheet"/>
@endsection
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
        <h1 class="mt-4">訂單紀錄</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{Auth::user()->name}}，您好</li>
        </ol>

        <section class="pt-4">
            <div class="container px-lg-6">
                <div class="row gx-lg-5">
                    <div class="col-lg-1 col-xxl-1 mb-5">編號</div>
                    <div class="col-lg-1 col-xxl-1 mb-5">房號</div>
                    <div class="col-lg-1 col-xxl-2 mb-5">開始時間</div>
                    <div class="col-lg-1 col-xxl-2 mb-5">結束時間</div>
                    <div class="col-lg-1 col-xxl-2 mb-5">應繳款帳戶</div>
                    <div class="col-lg-1 col-xxl-1 mb-5">狀態</div>
                    <div class="col-lg-1 col-xxl-2 mb-5">確認付款</div>
                </div>

                <!-- Main Content -->
                @foreach($order as $key => $order)
                    <div class="row gx-lg-5">
                        <div class="col-lg-1 col-xxl-1 mb-5">{{$order->id}}</div>
                        <div class="col-lg-1 col-xxl-1 mb-5">{{$order->room_id}}</div>
                        {{--            <div class="col-lg-2 col-xxl-2 mb-5">{{($room->shelf_status)? '開放訂購' : '整理中'}}</div>--}}
                        <div class="col-lg-1 col-xxl-2 mb-5">
                            {{$order->start_date}}
                        </div>
                        <div class="col-lg-1 col-xxl-2 mb-5">
                            {{$order->end_date}}
                        </div>
                        <div class="col-lg-1 col-xxl-2 mb-5">
                            {{ $account}}
                        </div>
                        <div class="col-lg-1 col-xxl-1 mb-5">
                            {{ $order->status }}
                        </div>
                        <div class="col-lg-1 col-xxl-1 mb-5">
                            <form action="{{route('orders.update', $order->id)}}" role="form" method="POST" style="display: inline-block">
                                @method('PATCH')
                                @csrf
                                @if($order->status=='未處理')
                                    <button class="btn btn-sm btn-danger" type="submit" value="已付款" name="status">已付款</button>
                                @else
                                    <button class="btn btn-sm btn-danger" type="submit" value="已付款" name="status" disabled>已付款</button>
                                @endif
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

