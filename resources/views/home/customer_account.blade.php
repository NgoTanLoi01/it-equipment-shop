@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endsection

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        /* Added some space below the table */
    }

    .table th,
    .table td {
        border: 1px solid rgba(249, 140, 140, 0.8);
        !important vertical-align: middle;
        /* Ensures text is centered vertically */
    }

    .table th {
        background-color: #faa3a3;
        color: #d9534f;
    }

    .order-tab-content {
        display: none;
    }

    .order-tab-content.active {
        display: block;
    }

    .search-bar {
        margin-bottom: 15px;
    }

    #all-orders .table th,
    #all-orders .table td,
    #pending-orders .table th,
    #pending-orders .table td,
    #shipping-orders .table th,
    #shipping-orders .table td,
    #delivered-orders .table th,
    #delivered-orders .table td,
    #cancelled-orders .table th,
    #cancelled-orders .table td {
        text-align: center;

        /* font-weight: bold; */
    }

    #all-orders .table th,
    #pending-orders .table th,
    #shipping-orders .table th,
    #delivered-orders .table th,
    #cancelled-orders .table th {
        color: black;
    }

    .even-row {
        background-color: #fae1dd;
    }

    .odd-row {
        background-color: #ffffff;
    }
</style>
@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ asset('UserLTE/assets/images/oso.png') }}')">
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
                                            style="font-size: 24px"></i><strong>&nbsp;Đơn Đặt
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
                                            class="bi bi-person" style="font-size: 24px"></i><strong>&nbsp;Hồ Sơ
                                        </strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('/logout-checkout') }}"><i
                                            class="bi bi-box-arrow-left" style="font-size: 24px"></i><strong>&nbsp;Đăng Xuất
                                        </strong></a>
                                </li>
                            </ul>
                        </aside>

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    <!-- Đơn đặt hàng -->
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
                                                        <th><strong>Mã đơn hàng</strong></th>
                                                        <th><strong>Tên người nhận</strong></th>
                                                        <th><strong>Ngày đặt</strong></th>
                                                        <th><strong>Trạng Thái</strong></th>
                                                        <th><strong>Tổng tiền</strong></th>
                                                        <th><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="{{ route('ordered.info', $order->order_id) }}"><i
                                                                        class="bi bi-eye"></i></a>
                                                                @if ($order->delivery_status == 'Chờ xác nhận')
                                                                    <a href="#" class="cancel-order"
                                                                        data-order-id="{{ $order->order_id }}"><i
                                                                            class="bi bi-trash3"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 text-center">
                                                {{ $orders->links('pagination::bootstrap-4') }}
                                            </div>
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
                                                        <th style=""><strong>Mã đơn hàng</strong></th>
                                                        <th style=""><strong>Tên người nhận</strong></th>
                                                        <th style=""><strong>Ngày đặt</strong></th>
                                                        <th style=""><strong>Trạng Thái</strong></th>
                                                        <th style=""><strong>Tổng tiền</strong></th>
                                                        <th style=""><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendingOrders as $order)
                                                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="{{ route('ordered.info', $order->order_id) }}"><i
                                                                        class="bi bi-eye"></i></a>
                                                                <a href="#" class="cancel-order"
                                                                    data-order-id="{{ $order->order_id }}"><i
                                                                        class="bi bi-trash3"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 text-center">
                                                {{ $orders->links('pagination::bootstrap-4') }}
                                            </div>
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
                                                        <th><strong>Mã đơn hàng</strong></th>
                                                        <th><strong>Tên người nhận</strong></th>
                                                        <th><strong>Ngày đặt</strong></th>
                                                        <th><strong>Trạng Thái</strong></th>
                                                        <th><strong>Tổng tiền</strong></th>
                                                        <th><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shippingOrders as $order)
                                                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="{{ route('ordered.info', $order->order_id) }}"><i
                                                                        class="bi bi-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 text-center">
                                                {{ $orders->links('pagination::bootstrap-4') }}
                                            </div>
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
                                                        <th><strong>Mã đơn hàng</strong></th>
                                                        <th><strong>Tên người nhận</strong></th>
                                                        <th><strong>Ngày đặt</strong></th>
                                                        <th><strong>Trạng Thái</strong></th>
                                                        <th><strong>Tổng tiền</strong></th>
                                                        <th><strong>Thao tác</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($deliveredOrders as $order)
                                                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="{{ route('ordered.info', $order->order_id) }}"><i
                                                                        class="bi bi-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 text-center">
                                                {{ $orders->links('pagination::bootstrap-4') }}
                                            </div>
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
                                                        <th><strong>Mã đơn hàng</strong></th>
                                                        <th><strong>Tên người nhận</strong></th>
                                                        <th><strong>Ngày đặt</strong></th>
                                                        <th><strong>Trạng Thái</strong></th>
                                                        <th><strong>Tổng tiền</strong></th>
                                                        <th><strong>Thao tác</strong></th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cancelledOrders as $order)
                                                        <tr class="{{ $loop->index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ $order->shipping_name }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->delivery_status }}</td>
                                                            <td>{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                                            <td style="text-align: center; font-size: 24px">
                                                                <a href="{{ route('ordered.info', $order->order_id) }}"><i
                                                                        class="bi bi-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-12 text-center">
                                                {{ $orders->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- ĐỔi mật khẩu customer --}}
                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form action="#" method="POST">
                                        @csrf
                                        <input type="hidden" name="customer_id"
                                            value="{{ $customer_info->customer_id }}">
                                        <label style="color: black"><strong>Tên Hiển Thị *</strong></label>
                                        <input type="text" class="form-control" style="color: black"
                                            value="{{ $customer_info->customer_name ?? '' }}" required readonly>
                                        <small class="form-text">Đây sẽ là cách tên của bạn được hiển thị trong phần
                                            tài
                                            khoản và trong phần đánh giá</small>

                                        <label style="color: black"><strong>Địa chỉ Email *</strong></label>
                                        <input type="email" class="form-control" style="color: black"
                                            value="{{ $customer_info->customer_email ?? '' }}" required readonly>

                                        <label style="color: black"><strong>Số điện thoại</strong></label>
                                        <input type="text" class="form-control" style="color: black"
                                            value="{{ $customer_info->customer_phone ?? '' }}" required>

                                        <label style="color: black"><strong>Mật khẩu hiện tại</strong></label>
                                        <input type="password" class="form-control">

                                        <label style="color: black"><strong>Mật khẩu mới</strong></label>
                                        <input type="password" class="form-control">

                                        <label style="color: black"><strong>Xác nhận mật khẩu mới</strong></label>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.cancel-order').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const orderId = this.getAttribute('data-order-id');

                Swal.fire({
                    title: 'Bạn muốn hủy đơn hàng?',
                    text: "Bạn không thể hoàn tác điều này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/orders/cancel/${orderId}`, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Đã hủy!',
                                        text: 'Đơn hàng của bạn đã hủy!.',
                                        icon: 'success'
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'There was an error cancelling your order.',
                                        icon: 'error'
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'There was an error cancelling your order.',
                                    icon: 'error'
                                });
                            });
                    }
                });
            });
        });
    });
</script>
