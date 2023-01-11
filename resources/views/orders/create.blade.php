@extends('layouts.master')

@section('page-title', '訂購房間')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">訂購房間</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增訂單</li>
    </ol>
    <div class="mb-2">
        @if(isset($images[0]->image))
            <img src="{{ asset('images/'.$images[0]->image) }}" height="230px" width="300px" alt="一張圖片">
        @endif
    </div>
    <div class="form-group">
        <label for="id" class="form-label">房號：</label>
        <input id="id" name="id" class="form-control" value="{{ $rooms->id }}" placeholder="請輸入文章房號" disabled>
    </div>
    <div class="form-group">
        <label for="introduce" class="form-label">介紹：</label>
        <textarea id="introduce" name="introduce" class="form-control" rows="4" disabled>{{ $rooms->introduce }}</textarea>
    </div>
    <div class="form-group">
        <label for="people" class="form-label">可住人數：</label>
        <input id="people" name="people" class="form-control" value="{{ $rooms->people }}" placeholder="請輸入可住人數" disabled>
    </div>
    <div class="form-group">
        <label for="amount" class="form-label">金額：</label>
        <input id="amount" name="amount" class="form-control" value="{{ $rooms->amount }}" placeholder="請輸入金額" disabled>
    </div>
    <div class="form-group">
        <label for="amount" class="form-label">應繳款帳戶：</label>
        <input id="amount" name="amount" class="form-control" value="{{ $account }}" placeholder="" disabled>
    </div><br>
    <form action="{{route('orders.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
            <input id="room_id" type="hidden" name="room_id" value="{{ $rooms->id }}">
            <label for="start_date">預定入住日期：</label>
            <input id="start_date" type="date" name="start_date">
            <label for="end_date">預定結束日期：</label>
            <input id="end_date" type="date" name="end_date">
        <button class="btn btn-primary btn-sm" type="submit">儲存</button><br>
<hr>
        <section class="pt-4">
                <div class="container px-lg-5" style="line-height:0px;">
                @if(isset($order[0]))
                    <div class="row gx-lg-5">
                        <div text-align="center"><h2>已被訂購時段</h2></div>
                    </div>
                    <div class="row gx-lg-5">
                        <div class="col-lg-2 col-xxl-2 mb-5" style="width:15%;">預訂開始時間</div>
                        <div class="col-lg-2 col-xxl-2 mb-5" style="width:15%;">預訂結束時間</div>
                    </div>
                @endif
                @foreach($order as $key => $order)
                    <div class="row gx-lg-5">
                        <div class="col-lg-2 col-xxl-2 mb-5">{{$order->start_date}}</div>
                        <div class="col-lg-2 col-xxl-2 mb-5">{{$order->end_date}}</div>
                    </div>
                @endforeach
            </div>
        </section>

        {{--        <div class="mb-2">--}}
{{--            <input type="file" name="image" accept="image/*">--}}
{{--            <img src="{{ asset('images/'.$images[0]->image) }}" alt="一張圖片">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="id" class="form-label">房號：</label>--}}
{{--            <input id="id" name="id" class="form-control" value="{{ $rooms->id }}" placeholder="請輸入文章房號">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="introduce" class="form-label">介紹：</label>--}}
{{--            <textarea id="introduce" name="introduce" class="form-control" rows="10">{{ $rooms->introduce }}</textarea>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="shelf_status" class="form-label">上架狀態？</label>--}}
{{--            <select id="shelf_status" name="shelf_status" class="form-control">--}}
{{--                <option value="0" {{(!$rooms->shelf_status)? 'selected':''}}>整理中</option>--}}
{{--                <option value="1" {{($rooms->shelf_status)? 'selected':''}}>開放訂購</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="people" class="form-label">可住人數：</label>--}}
{{--            <input id="people" name="people" class="form-control" value="{{ $rooms->people }}" placeholder="請輸入可住人數">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="amount" class="form-label">金額：</label>--}}
{{--            <input id="amount" name="amount" class="form-control" value="{{ $rooms->amount }}" placeholder="請輸入金額">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="amount" class="form-label">確認您的帳戶：</label>--}}

{{--            <input id="amount" name="amount" class="form-control" value="{{ $account }}" placeholder="" disabled>--}}
{{--        </div>--}}
{{--        <div class="text-right">--}}
{{--            <button class="btn btn-primary btn-sm" type="submit">送出</button>--}}
{{--        </div>--}}
    </form>
</div>
@endsection
