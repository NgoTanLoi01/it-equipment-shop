@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/js-datatables/style.css') }}">
    {{-- Hien thi mau sac xen ky --}}
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
    {{-- Tìm kiếm sản phẩm --}}
    <script src="{{ asset('AdminMofi/assets/js/search.js') }}"></script>
@endsection

@section('content')
    {{-- ================================ --}}
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>DANH SÁCH SETTING</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product-header">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('settings.create') . '?type=Textarea' }}"><img
                                        src="{{ asset('AdminMofi/assets/images/icon/add.png') }}" width="16px" alt=""><strong>Thêm Setting</strong></a></a>
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
                                                    <th scope="col"><strong>Config key</strong></th>
                                                    <th scope="col"><strong>Config value</strong></th>
                                                    <th scope="col"><strong>Hành động</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($settings as $setting)
                                                    <tr>
                                                        <th scope="row">{{ $setting->id }}</th>
                                                        <td>{{ $setting->config_key }}</td>
                                                        <td>{{ $setting->config_value }}</td>
                                                        <td>
                                                            <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                                                                class="btn btn-sm btn-warning"><img
                                                                src="{{ asset('AdminMofi/assets/images/icon/edit.png') }}" width="16px" alt=""><strong>Sửa</strong></a>
                                                            <a href="" class="btn btn-sm btn-danger action_delete"
                                                                data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"><img
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
                                                    {{ $settings->links('pagination::bootstrap-4') }}
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
