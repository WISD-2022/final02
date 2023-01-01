@extends('rooms.layouts.master')

@section('page-title', 'Edit article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">編輯文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
        <strong>錯誤！</strong> 請修正以下問題：
        <ul>
            <li>錯誤 1</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @include('admin.layouts.shared.errors')
    </div>
    <form action="{{route('orders.update', $post->id)}}" method="POST" role="form">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">這邊是會員訂購房間：</label>
            <input id="title" name="title" class="form-control" value="{{old('title')}}" placeholder="請輸入文章標題">
        </div>
        <div class="form-group">
            <label for="content" class="form-label">內容：</label>
            <textarea id="content" name="content" class="form-control" rows="10">{{old('content')}}</textarea>
        </div>
        <div class="form-group">
            <label for="is_feature" class="form-label">精選？</label>
            <select id="is_feature" name="is_feature" class="form-control">
                <option value="0">否</option>
                <option value="1">是</option>
            </select>
        </div>
        <div class="text-right">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>

        <div class="text-right"><div class="mb-2">
                <input type="file" name="image" accept="image/*" value="{{'image', old($room->image)}}">
            </div>
            <div class="form-group">
                <label for="id" class="form-label">房號：</label>
                <input id="id" name="id" class="form-control" value="{{old($room->id)}}" placeholder="" disabled>
            </div>
            <div class="form-group">
                <label for="introduce" class="form-label">介紹：</label>
                <textarea id="introduce" name="introduce" class="form-control" rows="10" disabled>{{old($room->introduce)}}</textarea>
            </div>
            <div class="form-group">
                <label for="shelf_status" class="form-label">上架狀態？</label>
                <select id="shelf_status" name="shelf_status" class="form-control" disabled>
                    <option value="0" {{(!$room->shelf_status)? 'selected':''}}>整理中</option>
                    <option value="1" {{($room->shelf_status)? 'selected':''}}>開放訂購</option>
                </select>
            </div>
            <div class="form-group">
                <label for="people" class="form-label">可住人數：</label>
                <input id="people" name="people" class="form-control" value="{{old($room->people)}}" placeholder="" disabled>
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">金額：</label>
                <input id="amount" name="amount" class="form-control" value="{{old($room->id)}}" placeholder="" disabled>
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">應付款帳戶：</label>

                <input id="amount" name="amount" class="form-control" value="{{old($room->account}}" placeholder="" disabled>
            </div>
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
