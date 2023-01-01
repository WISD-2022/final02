@extends('layouts.master')

@section('page-title', '民宿訂房')

@section('page-style')
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/home-styles.css') }}" rel="stylesheet"/>
@endsection

@section('page-content')

    @include('home.shared.header')

    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->
            @foreach($rooms as $key => $room)
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <h2 class="fs-4 fw-bold">房號：{{$room->id}}</h2>
                            <p class="mb-0">{{ $room->introduce }}</p>
                            <p class="mb-0">可住人數：{{ $room->people }}</p>
                            <p class="mb-0">金額：${{ $room->amount }}</p>
                            <p class="mb-0">目前狀態：{{($room->shelf_status)? '開放訂購' : '整理中'}}</p>
                            <a class="btn btn-success btn-sm" href="{{ route('orders.create') }}">訂房</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
@endsection
