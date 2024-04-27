@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('adminPublic/slider/index/index.css') }}">
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/js-datatables/style.css') }}">
    {{-- Doi mau sac xen ky --}}
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
    {{-- Tìm kiếm sản phẩm --}}
    <script src="{{ asset('AdminMofi/assets/js/search.js') }}"></script>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>DANH SÁCH VAI TRÒ HỆ THỐNG</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product-header">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('roles.create') }}"><img
                                        src="{{ asset('AdminMofi/assets/images/icon/add.png') }}" width="16px" alt=""><strong>Thêm Vai Trò Hệ Thống</strong></a>
                                </div>
                                <div class="collapse" id="collapseProduct">
                                </div>
                            </div>
                            <div class="list-product">
                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-top">
                                        <div class="datatable">
                                            <label>
                                                <select class="datatable-selector">
                                                    <option value="10" selected="">5</option>
                                                    <option value="15">10</option>
                                                    <option value="20">15</option>
                                                    <option value="25">20</option>
                                                </select> trên mỗi trang
                                            </label>
                                        </div>
                                        <div class="datatable-search">
                                            <input class="datatable-input" id="searchInput" placeholder="Search..."
                                                type="search" title="Search within table" aria-controls="project-status">
                                        </div>
                                    </div>
                                    <div class="datatable-container">
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong>Thứ tự</strong></th>
                                                    <th scope="col"><strong>Tên vai trò</strong></th>
                                                    <th scope="col"><strong>Mô tả vai trò</strong></th>
                                                    <th scope="col"><strong>Hành động</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role)
                                                    <tr>
                                                        <th scope="row">{{ $role->id }}</th>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{!! $role->display_name !!}</td>
                                                        <td>
                                                            <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                                                class="btn btn-sm btn-warning"><img
                                                                src="{{ asset('AdminMofi/assets/images/icon/edit.png') }}" width="16px" alt=""><strong>Sửa</strong></a>
                                                            <a href=""
                                                                data-url="{{ route('roles.delete', ['id' => $role->id]) }}"
                                                                class="btn btn-sm btn-danger action_delete"> <img
                                                                src="{{ asset('AdminMofi/assets/images/icon/delete.png') }}" width="16px" alt=""><strong>Xóa</strong></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datatable-bottom">
                                        <nav class="datatable-pagination">
                                            <ul class="datatable-pagination-list">
                                                <li>
                                                    {{ $roles->links('pagination::bootstrap-4') }}
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
