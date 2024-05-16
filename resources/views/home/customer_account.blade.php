@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endsection

<style>
    .order-tab-content {
        display: none;
    }

    .order-tab-content.active {
        display: block;
    }

    .search-bar {
        margin-bottom: 15px;
    }
</style>
@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/about-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Tài khoản</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Tài khoản</strong></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <br>

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                        href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                        aria-selected="true"><i class="bi bi-cart"
                                            style="font-size: 24px"></i><strong>&nbsp;Đơn
                                            Hàng </strong></a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                        role="tab" aria-controls="tab-address" aria-selected="false"><i
                                            class="bi bi-airplane" style="font-size: 24px"></i><strong>&nbsp;Địa
                                            Chỉ</strong></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                        role="tab" aria-controls="tab-account" aria-selected="false"><i
                                            class="bi bi-person" style="font-size: 24px"></i><strong>&nbsp;Tài Khoản
                                        </strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-box-arrow-left"
                                            style="font-size: 24px"></i><strong>&nbsp;Đăng Xuất </strong></a>
                                </li>
                            </ul>
                        </aside>

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    <!-- Order Tabs -->
                                    <ul class="nav nav-tabs" id="orderTabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="all-orders-tab" data-toggle="tab"
                                                href="#all-orders" role="tab" aria-controls="all-orders"
                                                aria-selected="true"><i class="bi bi-list-ul"
                                                    style="font-size: 24px"></i><strong> Tất cả</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pending-orders-tab" data-toggle="tab"
                                                href="#pending-orders" role="tab" aria-controls="pending-orders"
                                                aria-selected="false"><i class="bi bi-hourglass-split"
                                                    style="font-size: 24px"></i><strong> Chờ xác nhận</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="shipping-orders-tab" data-toggle="tab"
                                                href="#shipping-orders" role="tab" aria-controls="shipping-orders"
                                                aria-selected="false"><i class="bi bi-truck"
                                                    style="font-size: 24px"></i><strong> Đang giao</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="delivered-orders-tab" data-toggle="tab"
                                                href="#delivered-orders" role="tab" aria-controls="delivered-orders"
                                                aria-selected="false"><i class="bi bi-check-circle"
                                                    style="font-size: 24px"></i><strong> Đã giao</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="cancelled-orders-tab" data-toggle="tab"
                                                href="#cancelled-orders" role="tab" aria-controls="cancelled-orders"
                                                aria-selected="false"><i class="bi bi-x-circle"
                                                    style="font-size: 24px"></i><strong> Đã hủy</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="orderTabsContent">
                                        {{-- Tất cả đơn hàng --}}
                                        <div class="tab-pane fade show active order-tab-content" id="all-orders"
                                            role="tabpanel" aria-labelledby="all-orders-tab"><br>
                                            <div class="search-bar">
                                                <input type="text" class="form-control" id="search-all"
                                                    placeholder="Tìm kiếm...">
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center"><strong>Mã đơn hàng</strong></th>
                                                        <th style="text-align: center"><strong>Tên người nhận</strong></th>
                                                        <th style="text-align: center"><strong>Ngày đặt</strong></th>
                                                        <th style="text-align: center"><strong>Trạng Thái</strong></th>
                                                        <th style="text-align: center"><strong>Tổng tiền</strong></th>
                                                        <th style="text-align: center"><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="#"><i class="bi bi-eye"></i></a>
                                                                <a href="#"><i class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Chờ xác nhận --}}
                                        <div class="tab-pane fade order-tab-content" id="pending-orders" role="tabpanel"
                                            aria-labelledby="pending-orders-tab">
                                            <br>
                                            <div class="search-bar">
                                                <input type="text" class="form-control" id="search-pending"
                                                    placeholder="Tìm kiếm...">
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center"><strong>Mã đơn hàng</strong></th>
                                                        <th style="text-align: center"><strong>Tên người nhận</strong></th>
                                                        <th style="text-align: center"><strong>Ngày đặt</strong></th>
                                                        <th style="text-align: center"><strong>Trạng Thái</strong></th>
                                                        <th style="text-align: center"><strong>Tổng tiền</strong></th>
                                                        <th style="text-align: center"><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendingOrders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="#"><i class="bi bi-eye"></i></a>
                                                                <a href="#"><i class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Đang giao --}}
                                        <div class="tab-pane fade order-tab-content" id="shipping-orders" role="tabpanel"
                                            aria-labelledby="shipping-orders-tab">
                                            <br>
                                            <div class="search-bar">
                                                <input type="text" class="form-control" id="search-shipping"
                                                    placeholder="Tìm kiếm...">
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center"><strong>Mã đơn hàng</strong></th>
                                                        <th style="text-align: center"><strong>Tên người nhận</strong></th>
                                                        <th style="text-align: center"><strong>Ngày đặt</strong></th>
                                                        <th style="text-align: center"><strong>Trạng Thái</strong></th>
                                                        <th style="text-align: center"><strong>Tổng tiền</strong></th>
                                                        <th style="text-align: center"><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shippingOrders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="#"><i class="bi bi-eye"></i></a>
                                                                <a href="#"><i class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Đã giao --}}
                                        <div class="tab-pane fade order-tab-content" id="delivered-orders"
                                            role="tabpanel" aria-labelledby="delivered-orders-tab">
                                            <br>
                                            <div class="search-bar">
                                                <input type="text" class="form-control" id="search-delivered"
                                                    placeholder="Tìm kiếm...">
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center"><strong>Mã đơn hàng</strong></th>
                                                        <th style="text-align: center"><strong>Tên người nhận</strong></th>
                                                        <th style="text-align: center"><strong>Ngày đặt</strong></th>
                                                        <th style="text-align: center"><strong>Trạng Thái</strong></th>
                                                        <th style="text-align: center"><strong>Tổng tiền</strong></th>
                                                        <th style="text-align: center"><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($deliveredOrders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="#"><i class="bi bi-eye"></i></a>
                                                                <a href="#"><i class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Đã hủy --}}
                                        <div class="tab-pane fade order-tab-content" id="cancelled-orders"
                                            role="tabpanel" aria-labelledby="cancelled-orders-tab">
                                            <br>
                                            <div class="search-bar">
                                                <input type="text" class="form-control" id="search-cancelled"
                                                    placeholder="Tìm kiếm...">
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center"><strong>Mã đơn hàng</strong></th>
                                                        <th style="text-align: center"><strong>Tên người nhận</strong></th>
                                                        <th style="text-align: center"><strong>Ngày đặt</strong></th>
                                                        <th style="text-align: center"><strong>Trạng Thái</strong></th>
                                                        <th style="text-align: center"><strong>Tổng tiền</strong></th>
                                                        <th style="text-align: center"><strong>Thao tác</strong></th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cancelledOrders as $order)
                                                        <tr>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="#"><i class="bi bi-eye"></i></a>
                                                                <a href="#"><i class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- ĐỔi mật khẩu customer --}}
                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <label>Tên Hiển Thị *</label>
                                        <input type="text" class="form-control"
                                            value="{{ isset($customer) ? $customer->customer_name : '' }}" required>
                                        <small class="form-text">Đây sẽ là cách tên của bạn được hiển thị trong phần
                                            tài
                                            khoản và trong phần đánh giá</small>

                                        <label>Địa chỉ Email *</label>
                                        <input type="email" class="form-control"
                                            value="{{ isset($customer) ? $customer->customer_email : '' }}" required>

                                        <label>Số điện thoại *</label>
                                        <input type="text" class="form-control"
                                            value="{{ isset($customer) ? $customer->customer_phone : '' }}" required>

                                        <label>Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control">

                                        <label>Mật khẩu mới</label>
                                        <input type="password" class="form-control">

                                        <label>Xác nhận mật khẩu mới</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LƯU THAY ĐỔI</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#orderTabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
        // Example search function for the tables
        $('#search-all').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#all-orders table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#search-pending').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#pending-orders table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#search-shipping').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#shipping-orders table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#search-delivered').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#delivered-orders table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#search-cancelled').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#cancelled-orders table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>