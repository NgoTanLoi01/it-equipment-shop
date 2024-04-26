@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminPublic/user/add/add.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('adminPublic/user/add/add.js') }}"></script>
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
                                    <h4>Thêm Thành Viên Hệ Thống</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên</label>
                                            <input name="name" type="text" class="form-control" placeholder="Nhập tên"
                                                value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" placeholder="Nhập email" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class = "form-control" placeholder="Nhập mật khẩu">
                                        </div>                            
                                        <div class="form-group">
                                            <label>Chọn vai trò</label><br>
                                            <select name="role_id[]" class="form-control select2_init" multiple>
                                                <option value=""></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{ $role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
            
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-up"></i>Gửi</button>
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
