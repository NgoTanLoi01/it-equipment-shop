@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/role/add/add.css') }}">
@endsection

@section('js')
    <script src="{{ asset('adminPublic/role/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="table-responsive theme-scrollbar">
                    <div id="basic-6_wrapper" class="dataTables_wrapper">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header card-no-border pb-0">
                                    <h4>SỬA VAI TRÒ HỆ THỐNG</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post"
                                        enctype="multipart/form-data" style="width: 100%">
                                        <div class="col-md-12">
                                            @csrf
                                            <div class="form-group">
                                                <label><strong>Tên vai trò</strong></label>
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Nhập tên vai trò" value="{{ $role->name }}">
                                            </div><br>
                                            <div class="form-group">
                                                <label><strong>Mô tả vai trò</strong></label>
                                                <textarea name="display_name" id="content" class="form-control">{{ $role->display_name }}</textarea>
                                            </div><br>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">
                                                        <input type="checkbox" class="checkall">
                                                        <span style="font-size: 16px"><b>Chọn tất cả</b></span>
                                                    </label>
                                                </div>
                                                @foreach ($permissionsParent as $permissionsParentItem)
                                                    <div class="card border-primary mb-3 col-md-12"
                                                        style="max-width: 100%;">
                                                        <div class="card-header">
                                                            <label>
                                                                <input type="checkbox" value=""
                                                                    class="checkbox_wrapper">
                                                                    <span style="font-size: 14px; color:black">
                                                                        <b>Quản lý {{ $permissionsParentItem->name }}</b></span>
                                                            </label>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            @foreach ($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                                                <div class="card-body text-primary col-md-3">
                                                                    <h5 class="card-title">
                                                                        <label>
                                                                            <input type="checkbox" name="permission_id[]"
                                                                                {{ $permissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                                                                class="checkbox_childrent"
                                                                                value="{{ $permissionsChildrentItem->id }}">
                                                                        </label>
                                                                        {{ $permissionsChildrentItem->name }}
                                                                    </h5>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><img
                                            src="{{ asset('AdminMofi/assets/images/icon/success.png') }}" width="16px" alt=""><strong>Gửi</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>
@endsection
