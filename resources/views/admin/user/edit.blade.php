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
                                    <h4>SỬA THÔNG TIN THÀNH VIÊN HỆ THỐNG</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Tên</strong></label>
                                            <input name="name" type="text" class="form-control" placeholder="Nhập tên"
                                                value="{{ $user->name }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input name="email" type="email" class="form-control" placeholder="Nhập email"
                                                value="{{ $user->email }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input name="password" type="password" class = "form-control" placeholder="Nhập mật khẩu">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Chọn vai trò</strong></label><br>
                                            <select name="role_id[]" class="form-control select2_init" multiple>
                                                <option value=""></option>
                                                @foreach ($roles as $role)
                                                    <option 
                                                        {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : ''}}
                                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
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
