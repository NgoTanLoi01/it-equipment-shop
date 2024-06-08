@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

<style>
    h5 {
        font-weight: bold;
        padding: 12px;
        background-color: #e6e4f3;
        text-align: center;
    }

    th {
        background-color: #e6e4f3;
    }
</style>
{{-- Hien thi mau sac xen ky --}}
<link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>THÔNG TIN CHI TIẾT KHÁCH HÀNG</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product">
                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-container">
                                        <h5><b>THÔNG TIN KHÁCH HÀNG</b></h5>
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong> Tên khách hàng</strong></th>
                                                    <th scope="col"><strong> Số điện thoại</strong></th>
                                                    <th scope="col"><strong> Email</strong></th>
                                                    <th scope="col"><strong> Số đơn hàng đã đặt</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $customer->customer_name }}</td>
                                                    <td>{{ $customer->customer_phone }}</td>
                                                    <td>{{ $customer->customer_email }}</td>
                                                    <td>{{ $orderCount }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <h5><b>THÔNG TIN CHI TIẾT VẬN CHUYỂN ĐƠN HÀNG</b></h5>
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><strong> Tên người nhận</strong></th>
                                                    <th scope="col"><strong> Địa chỉ giao hàng</strong></th>
                                                    <th scope="col"><strong> Số điện thoại</strong></th>
                                                    <th scope="col"><strong> Ghi chú</strong></th>
                                                    <th scope="col"><strong> Ngày đặt hàng</strong></th>
                                                    <!-- Thêm cột ngày tạo -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shippings as $shipping)
                                                    <tr>
                                                        <td>{{ $shipping->shipping_name }}</td>
                                                        <td>{{ $shipping->shipping_address }}</td>
                                                        <td>{{ $shipping->shipping_phone }}</td>
                                                        <td>{{ $shipping->shipping_notes }}</td>
                                                        <td>{{ $shipping->created_at }}</td> <!-- Hiển thị ngày tạo -->
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
