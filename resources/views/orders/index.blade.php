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
        <h1 class="mt-4">訂單管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">訂單管理</li>
        </ol>

        <section class="pt-2">
            <div class="container px-lg-8">
                <div class="row gx-lg-1">
                    <div class="col-lg-1 col-xxl-1 mb-5">編號</div>
                    <div class="col-lg-1 col-xxl-1 mb-5">房號</div>
                    <div class="col-lg-2 col-xxl-2 mb-5">開始時間</div>
                    <div class="col-lg-2 col-xxl-2 mb-5">結束時間</div>
                    <div class="col-lg-1 col-xxl-2 mb-5">會員信箱</div>
                    <div class="col-lg-1 col-xxl-1 mb-5">金額</div>
                    <div class="col-lg-1 col-xxl-3 mb-5">交易狀態</div>
                </div>

                <!-- Main Content -->
                @foreach($order_date as $key => $order_date)
                    <div class="row gx-lg-1">
                        <div class="col-lg-1 col-xxl-1 mb-5">{{$order_date->id}}</div>
                        <div class="col-lg-1 col-xxl-1 mb-5">{{$order_date->room_id}}</div>
                        {{--            <div class="col-lg-2 col-xxl-2 mb-5">{{($room->shelf_status)? '開放訂購' : '整理中'}}</div>--}}
                        <div class="col-lg-2 col-xxl-2 mb-5">
                            {{$order_date->start_date}}
                        </div>
                        <div class="col-lg-2 col-xxl-2 mb-5">
                            {{$order_date->end_date}}
                        </div>
                        <div class="col-lg-1 col-xxl-2 mb-5">{{$users[$key]->email}}</div>
                        <div class="col-lg-1 col-xxl-1 mb-5">{{$order_date->amount}}</div>
                        <div class="col-lg-1 col-xxl-2 mb-5">
                            <form action="{{route('orders.update', $order_date->id)}}" method="POST" style="display:inline-block">
                                @method('PATCH')
                                @csrf
                                @if($order_date->status=='已付款')
                                    <select id="status" name="status" class="form-control">
                                        <option value="已付款" selected>已付款</option>
                                        <option value="已確認">已確認</option>
                                        <option value="已結束">已結束</option>
                                    </select><button class="btn btn-sm btn-primary" type="submit" value="儲存" @if($order_date->status=='未處理'||$order_date->status=='已結束') hidden @endif>儲存</button>

                                @elseif($order_date->status=='已確認')
                                    <select id="status" name="status" class="form-control">
                                        <option value="已付款">已付款</option>
                                        <option value="已確認" selected>已確認</option>
                                        <option value="已結束">已結束</option>
                                    </select><button class="btn btn-sm btn-primary" type="submit" value="儲存" @if($order_date->status=='未處理'||$order_date->status=='已結束') hidden @endif>儲存</button>

                                @elseif($order_date->status!='已付款' && $order_date->status!='已確認')
                                    {{$order_date->status}}
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-1 col-xxl-1 mb-5">
                            {{--                <a href="#">刪除</a>--}}
                            <form action="{{route('orders.destroy', $order_date->id)}}" method="POST" style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button class="btn btn-sm btn-danger" type="submit">取消</button>
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

