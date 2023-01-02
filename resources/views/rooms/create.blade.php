@extends('rooms.layouts.master')

@section('page-title', '新增房間')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">新增房間</h1>
{{--    <ol class="breadcrumb mb-4">--}}
{{--        <li class="breadcrumb-item active">新增房間</li>--}}
{{--    </ol>--}}
{{--    設定 enctype="multipart/form-data"--}}
    <form action="{{route('rooms.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <!--只接受影像圖檔-->

        <div class="text-right"><div class="mb-2">
            <div class="form-group">
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="id" class="form-label">房號：</label>
                <input id="id" name="id" class="form-control" value="" placeholder="請輸入房號">
            </div>
            <div class="form-group">
                <label for="introduce" class="form-label">介紹：</label>
                <textarea id="introduce" name="introduce" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="shelf_status" class="form-label">上架狀態？</label>
                <select id="shelf_status" name="shelf_status" class="form-control">
                    <option value="0">不開放</option>
                    <option value="1">開放訂購</option>
                </select>
            </div>
            <div class="form-group">
                <label for="people" class="form-label">可住人數：</label>
                <input id="people" name="people" class="form-control" value="" placeholder="請輸入可住人數">
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">金額：</label>
                <input id="amount" name="amount" class="form-control" value="" placeholder="請輸入金額">
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">確認您的帳戶：</label>

                <input id="amount" name="amount" class="form-control" value="{{$account}}" placeholder="" disabled>
            </div>
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div></div>
    </form>
</div>
@endsection
