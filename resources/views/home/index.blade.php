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
        <div class="container px-lg-5" >

            <!-- Page Features-->



            @foreach($rooms as $key => $room)

             <div class="row gx-lg-5" align="center">
                 <div class="col-lg-6 col-xxl-4 mb-5">
                     <div class="card bg-light border-0 h-100">
                         <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                             <h2 class="fs-4 fw-bold">房號：{{$room->id}}</h2>
                            <p class="mb-0">{{ Str::limit($room->introduce, 80) }}</p><br>
                            <p class="mb-0">可住人數：{{ $room->people }}</p>
                            <p class="mb-0">金額：${{ $room->amount }}</p>
                            <p class="mb-0">目前狀態：
                                <select id="shelf_status" name="shelf_status" class="form-control" style="text-align: center" disabled>
                                @if($room->shelf_status==0)
                                    <option value="0">不開放</option>
                                @elseif($room->shelf_status==1)
                                    <option value="1">開放訂購</option>
                                @endif
                                </select>
                            </p>
{{--                            <p class="mb-0">目前狀態：{{($room->shelf_status)? '開放訂購' : '整理中'}}</p>--}}
{{--                            <a class="btn btn-success btn-sm" href="{{ route('orders.show') }}">詳細資訊</a>--}}


                             @if($room->shelf_status==1)
                                 @if(isset($ismember))
                                    <a class="btn btn-success btn-sm" href="orders/create/{{$room->id}}">加入訂單</a>
                                 @endif
                             @endif
                             <a class="btn btn-success btn-sm" href="{{route('rooms.show', $room->id)}}">查看房間詳情</a>



                        </div>
                    </div>
                </div>
            </div>


            @endforeach

        </div>
    </section>
@endsection
