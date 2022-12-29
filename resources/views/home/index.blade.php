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
            <div class="row gx-lg-5">
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                            <h2 class="fs-4 fw-bold">房間A</h2>
                            <p class="mb-0">房間A</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                            <h2 class="fs-4 fw-bold">房間B</h2>
                            <p class="mb-0">房間B</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                            <h2 class="fs-4 fw-bold">房間C</h2>
                            <p class="mb-0">房間C</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                            <h2 class="fs-4 fw-bold">房間D</h2>
                            <p class="mb-0">房間D</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            
                            <h2 class="fs-4 fw-bold">房間E</h2>
                            <p class="mb-0">房間E</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                            <h2 class="fs-4 fw-bold">房間F</h2>
                            <p class="mb-0">房間F</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
