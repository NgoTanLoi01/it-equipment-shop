@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/setting/index/index.css') }}">
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
                            <h4>DANH SÁCH ĐƠN HÀNG</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product">
                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-top">
                                        <div class="datatable">
                                            <label>
                                                <select class="datatable-selector">
                                                    <option value="10" selected="">8</option>
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
                                                    <th scope="col"><strong>Tên người đặt</strong></th>
                                                    <th scope="col"><strong>Tổng giá tiền</strong></th>
                                                    <th scope="col"><strong>Phương thức thanh toán</strong></th>
                                                    <th scope="col"><strong>Hàng động</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_order as $order)
                                                    <tr>
                                                        <td>{{ $order->customer_name }}</td>
                                                        <td style="color: red">
                                                            {{ number_format(floatval($order->order_total)) }} VNĐ
                                                        </td>
                                                        <td>{{ $order->order_status }}</td>
                                                        <td>
                                                            <a href="{{ URL::to('/view-order/' . $order->order_id) }}"
                                                                class="btn btn-sm btn-success"><img
                                                                src="{{ asset('AdminMofi/assets/images/icon/view.png') }}" width="16px" alt=""><strong>Xem</strong></a>
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
                                                    @if ($all_order instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                        {{ $all_order->links('pagination::bootstrap-4') }}
                                                    @endif
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
