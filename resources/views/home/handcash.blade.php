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
            style="background-image: url('{{ asset('UserLTE/assets/images/demos/demo-3/slider/slideStore.jpg') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Thanh Toán</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Thanh Toán</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <br>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <div class="empty-cart-page section-padding-5">
                    <div class="container">
                        <div class="empty-cart-content text-center d-flex flex-column align-items-center">
                            <h1 class="page-title">ĐẶT HÀNG THÀNH CÔNG</h1><br>
                            <div class="empty-cart-img">
                                <img width="100px" src="{{ asset('UserLTE/assets/images/icons/check_donhang.png') }}"
                                    alt="">
                            </div><br>
                            <h5><strong>Cảm ơn bạn đã mua sắm tại trang web của chúng tôi</strong></h5><br>
                            <a href="{{ route('customer_account') }}" class="btn btn-primary">
                                <img width="32px" src="{{ asset('UserLTE/assets/images/icons/go-back.png') }}"
                                    alt="">
                                <strong>Xem đơn hàng đã đặt</strong>
                            </a>

                        </div>
                    </div>
                </div>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    </main><!-- End .main -->
@endsection
