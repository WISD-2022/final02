@extends('layouts.master')

@section('page-title', '訂購房間')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">訂購房間</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增訂單</li>
    </ol>
    <form action="{{route('orders.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
            <input id="room_id" type="hidden" name="room_id" value="{{ $rooms->id }}">
            <label for="start_date">預定入住日期：</label>
            <input id="start_date" type="date" name="start_date">
            <label for="end_date">預定結束日期：</label>
            <input id="end_date" type="date" name="end_date">
        <button class="btn btn-primary btn-sm" type="submit">儲存</button>

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
