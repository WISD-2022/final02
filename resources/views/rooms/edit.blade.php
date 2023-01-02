@extends('rooms.layouts.master')

@section('page-title', '編輯房間')
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
    <h1 class="mt-4">編輯房間</h1>
{{--    <ol class="breadcrumb mb-4">--}}
{{--        <li class="breadcrumb-item active">編輯文章</li>--}}
{{--    </ol>--}}

    <form action="{{route('rooms.update', $room->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-2">
            @if(isset($images[0]->image))
                <img src="{{ asset('images/'.$images[0]->image) }}" height="230px" width="300px" alt="一張圖片">
            @endif
            <input type="file" name="image" accept="image/*">
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
{{--            <select id="shelf_status" name="shelf_status" class="form-control" style="text-align: center">--}}
{{--                @if($room->shelf_status==0)--}}
{{--                    <option value="0">整理中</option>--}}
{{--                @elseif($room->shelf_status==1)--}}
{{--                    <option value="1">開放訂購</option>--}}
{{--                @elseif($room->shelf_status==2)--}}
{{--                    <option value="2">已被訂購</option>--}}
{{--                @endif--}}
{{--            </select>--}}
            <select id="shelf_status" name="shelf_status" class="form-control">
                @if($room->shelf_status==0)
                    <option value="0" selected>不開放</option>
                    <option value="1">開放訂購</option>
                @elseif($room->shelf_status==1)
                    <option value="0">不開放</option>
                    <option value="1" selected>開放訂購</option>
                @endif
            </select>
{{--            <select id="shelf_status" name="shelf_status" class="form-control">--}}
{{--                <option value="0" {{(!$room->shelf_status)? 'selected':''}}>整理中</option>--}}
{{--                <option value="1" {{($room->shelf_status)? 'selected':''}}>開放訂購</option>--}}
{{--                <option value="2" {{($room->shelf_status)? 'selected':''}}>已被訂購</option>--}}
{{--            </select>--}}
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
