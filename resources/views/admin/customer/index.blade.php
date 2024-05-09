@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/slider/index/index.css') }}">
    {{-- Doi mau sac xen ky --}}
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/js-datatables/style.css') }}">
    {{-- Doi mau sac xen ky --}}
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>DANH SÁCH KHÁCH HÀNG</h4>
                        </div>
                        <div class="card-body">
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
                                                    <th scope="col"><strong>Tên</strong></th>
                                                    <th scope="col"><strong>Email</strong></th>
                                                    <th scope="col"><strong>Số điện thoại</strong></th>
                                                    <th scope="col"><strong>Hành động</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        <td scope="row">{{ $customer->customer_name }}</td>
                                                        <td>{{ $customer->customer_email }}</td>
                                                        <td>{{ $customer->customer_phone }}</td>
                                                        <td>
                                                            <a href="{{ route('customers.view', ['id' => $customer->customer_id]) }}" class="btn btn-sm btn-success">
                                                                <img src="{{ asset('AdminMofi/assets/images/icon/view.png') }}" width="16px" alt=""><strong>Xem</strong>
                                                            </a>
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
                                                    {{-- {{ $customer->links('pagination::bootstrap-4') }} --}}
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
