@extends('rooms.layouts.master')

@section('page-title', '編輯房間')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">編輯房間</h1>
{{--    <ol class="breadcrumb mb-4">--}}
{{--        <li class="breadcrumb-item active">編輯文章</li>--}}
{{--    </ol>--}}

    <form action="{{route('rooms.update', $room->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-2">
            <input type="file" name="image" accept="image/*">
            <img src="{{ asset('images/'.$images[0]->image) }}" alt="一張圖片">
        </div>
        <div class="form-group">
            <label for="id" class="form-label">房號：</label>
            <input id="id" name="id" class="form-control" value="{{ $room->id }}" placeholder="請輸入文章房號">
        </div>
        <div class="form-group">
            <label for="introduce" class="form-label">介紹：</label>
            <textarea id="introduce" name="introduce" class="form-control" rows="10">{{ $room->introduce }}</textarea>
        </div>
        <div class="form-group">
            <label for="shelf_status" class="form-label">上架狀態？</label>
            <select id="shelf_status" name="shelf_status" class="form-control">
                <option value="0" {{(!$room->shelf_status)? 'selected':''}}>整理中</option>
                <option value="1" {{($room->shelf_status)? 'selected':''}}>開放訂購</option>
            </select>
        </div>
        <div class="form-group">
            <label for="people" class="form-label">可住人數：</label>
            <input id="people" name="people" class="form-control" value="{{ $room->people }}" placeholder="請輸入可住人數">
        </div>
        <div class="form-group">
            <label for="amount" class="form-label">金額：</label>
            <input id="amount" name="amount" class="form-control" value="{{ $room->amount }}" placeholder="請輸入金額">
        </div>
        <div class="form-group">
            <label for="amount" class="form-label">確認您的帳戶：</label>

            <input id="amount" name="amount" class="form-control" value="{{ $account }}" placeholder="" disabled>
        </div>
        <div class="text-right">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
