@extends('layouts.master')

@section('page-title', '民宿訂房')

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

    @include('home.shared.header')

    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->





                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <h2 class="fs-4 fw-bold">房號：{{$rooms->id}}</h2>
                                <p class="mb-0">{{ $rooms->introduce }}</p><br>
                                <p class="mb-0">可住人數：{{ $rooms->people }}</p>
                                <p class="mb-0">金額：${{ $rooms->amount }}</p>
                                <p class="mb-0">目前狀態：
                                    <select id="shelf_status" name="shelf_status" class="form-control" style="text-align: center" disabled>
                                        @if($rooms->shelf_status==0)
                                            <option value="0">整理中</option>
                                        @elseif($rooms->shelf_status==1)
                                            <option value="1">開放訂購</option>
                                        @elseif($rooms->shelf_status==2)
                                            <option value="2">已被訂購</option>
                                        @endif
                                    </select>
                                </p>
                                {{--                            <p class="mb-0">目前狀態：{{($room->shelf_status)? '開放訂購' : '整理中'}}</p>--}}
                                {{--                            <a class="btn btn-success btn-sm" href="{{ route('orders.show') }}">詳細資訊</a>--}}


                                @if($rooms->shelf_status==1)
                                    @if(isset(Auth::user()->ismember))
                                        <a class="btn btn-success btn-sm" href="../orders/create/{{$rooms->id}}">加入訂單</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </section>
@endsection
