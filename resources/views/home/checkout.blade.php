@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Thông tin đơn hàng<span>Cửa hàng</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 style="color: #fcb941" class="checkout-title">Chi tiết giao hàng</h2>
                                <!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Họ và tên người nhận *</label>
                                        <input name="shipping_name" type="text" class="form-control"
                                            value="{{ $customer_info->customer_name ?? '' }}" readonly required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Điện thoại người nhận *</label>
                                <input name="shipping_phone" type="tel" class="form-control"
                                    value="{{ $customer_info->customer_phone ?? '' }}" readonly required>

                                <label>Email *</label>
                                <input name="shipping_email" type="email" class="form-control"
                                    value="{{ $customer_info->customer_email ?? '' }}" readonly required>

                                <label>Địa chỉ nhận hàng *</label>
                                <input name="shipping_address" type="text" class="form-control" required>

                                <label>Ghi chú đơn hàng (nếu có)</label>
                                <textarea class="form-control" cols="30" rows="4" name="shipping_notes"
                                    placeholder="Ghi chú đơn hàng của bạn, ví dụ những lưu ý khi giao hàng, thời gian giao hàng,..."></textarea>

                                <button type="submit" value="Gửi" name="send_order"
                                    class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="">Đặt hàng</span>
                                </button>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
