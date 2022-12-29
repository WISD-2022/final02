@extends('rooms.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">訂單管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">訂單一覽表</li>
    </ol>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" style="text-align: left">標題</th>
{{--            <th scope="col">標題</th>--}}
            <th scope="col" style="text-align: right">精選?</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach(range(1, 10) as $id)--}}{{--
        @foreach($posts as $post)
            <tr>
                <td style="text-align: right">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td style="text-align: right">{{($post->is_feature)? 'v' : 'x'}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{route('orders.edit', $post->id)}}">編輯</a>
--}}{{--                    <a href="{{route('admin.posts.edit', $post->id)}}">編輯</a>--}}{{--
                    /
                    <form action="{{route('orders.destroy', $post->id)}}" method="POST" style="display: inline-block">
--}}{{--                        @method('DELETE')--}}{{--
--}}{{--                        @csrf--}}{{--
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                    </form>
--}}{{--                    <a href="#">刪除</a>--}}{{--
                </td>
--}}{{--                <th scope="row" style="width: 50px">{{ $id }}</th>--}}{{--
--}}{{--                <td>{{ '標題' . $id }}</td>--}}{{--
--}}{{--                <td style="width: 150px">--}}{{--
--}}{{--                    <button type="button" class="btn btn-primary btn-sm">編輯</button>--}}{{--
--}}{{--                    <button type="button" class="btn btn-danger btn-sm">刪除</button>--}}{{--
--}}{{--                </td>--}}{{--
            </tr>
        @endforeach--}}

        </tbody>
    </table>
</div>
@endsection
