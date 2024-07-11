@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endsection
<style>
    .page-content {
        padding: 20px;
    }

    .container {
        width: 100%;
        margin: 0 auto;
    }

    .container__address-content-hd,
    .cart-title h4 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #d9534f;
    }

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

    .price-col,
    .stock-col {
        text-align: center;
    }

    .paid_tag {
        position: absolute;
        top: 50%;
        right: 50%;
        transform: translate(50%, -50%) rotate(-30deg);
        background-color: #f9c2c2;
        padding: 10px;
        border: 1px solid #d9534f;
        z-index: 10;
        color: #d9534f;
    }

    .page-header {
        margin-bottom: 20px;
        /* Add some space below the page header */
    }

    .page-header h1 {
        font-size: 36px;
        /* Increase the size of the header title */
        color: white;
        /* Make the header title color white */
    }

    .page-header .breadcrumb a {
        color: #d9534f;
        font-weight: bold;
    }

    .shipping-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .shipping-list li {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .shipping-list li span {
        margin-right: 15px;
    }

    .cart-totals .cart-total-table {
        margin-top: 20px;
        /* Adds some space above the totals table */
    }

    .cart-totals .table {
        border: 1px solid rgba(249, 140, 140, 0.8);
    }

    .cart-totals .table td {
        font-size: 18px;
        padding: 15px;
    }

    .cart-totals .table .text-right {
        text-align: right;
    }

    .cart-totals .totalBill {
        font-size: 20px;
        font-weight: bold;
    }

    .container__address-content-hd {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .container__address-content-hd-icon {
        margin-right: 10px;
        color: #d9534f;
        font-size: 24px;
    }
</style>

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ asset('UserLTE/assets/images/oso.png') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Chi Tiết Đơn Hàng</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Chi Tiết Đơn Hàng</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><br><!-- End .page-header -->

        <div class="page-content">
            <div class="container">
                <div class="container__address">
                    <div class="container__address-css"></div>
                    <div class="container__address-content">
                        <div class="container__address-content-hd justify-content-between">
                            <div><i class="container__address-content-hd-icon bi bi-geo-alt-fill"></i>Thông Tin Nhận Hàng
                            </div>
                        </div>
                        <ul class="shipping-list list-address">
                            <li class="cus-radio align-items-center" style="font-size:20px;">
                                <span class="mr-2">{{ $shipping_info->shipping_name }}</span>&nbsp&nbsp&nbsp
                                <span class="mr-2">{{ $shipping_info->shipping_phone }}</span>&nbsp&nbsp&nbsp
                                <span>{{ $shipping_info->shipping_address }}</span>
                            </li>
                        </ul>
                    </div>
                </div><br>
                <div class="container__address-content-hd justify-content-between">
                    <div><i class="container__address-content-hd-icon bi bi-bag-check-fill"></i>Sản Phẩm Đã Đặt
                    </div>
                </div>
                <table class="table table-wishlist table-mobile" style="text-align: center;">
                    <thead>
                        <tr>
                            <th style="color: black; font-weight: bold">Hình Ảnh</th>
                            <th style="color: black; font-weight: bold">Sản Phẩm</th>
                            <th style="color: black; font-weight: bold">Giá</th>
                            <th style="color: black; font-weight: bold">Số Lượng</th>
                            <th style="color: black; font-weight: bold">Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            <tr>
                                <td class="image">
                                    <img width="150px" src="{{ asset($detail->product->feature_image_path) }}"
                                        alt="Product image">
                                </td>
                                <td class="product">
                                    <h3 class="product-title">
                                        <a
                                            href="{{ route('detail', ['slug' => $detail->product->slug]) }}">{{ $detail->product_name }}</a>
                                    </h3>
                                </td>
                                <td class="price">{{ number_format($detail->product_price) }} VND</td>
                                <td class="quantity">{{ $detail->product_sales_quantity }}</td>
                                <td class="total">
                                    {{ number_format($detail->product_price * $detail->product_sales_quantity) }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-totals shop-single-content">
                            <div class="container__address-content-hd justify-content-between">
                                <div><i class="container__address-content-hd-icon bi bi-cash"></i>Tổng Tiền Sản Phẩm
                                </div>
                            </div>
                            <div class="cart-total-table mt-25" style="position:relative;">
                                <table class="table">
                                    <tbody style="color: black; font-weight: bold">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td class="text-right">{{ number_format($order->order_total) }}đ</td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>Phí vận chuyển (Miễn phí)</td>
                                            <td class="text-right">
                                                Miễn phí </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>Phương thức thanh toán</td>
                                            <td class="text-right">
                                                {{ $order->order_status }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: red" width="70%">Thành tiền</td>
                                            <td style="color: red" class="text-right totalBill">
                                                {{ number_format($order->order_total) }}đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End .main -->
@endsection
