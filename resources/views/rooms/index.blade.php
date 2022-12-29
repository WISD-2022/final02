@extends('rooms.layouts.master')

@section('page-title', '民宿訂房管理')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">主控台</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">主控台</li>
    </ol>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('rooms.create') }}">新增</a>
    </div>
    <!-- Main Content -->

</div>
@endsection
