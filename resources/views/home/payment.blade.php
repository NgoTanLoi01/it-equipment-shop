@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <style>
        .payment-options {
            margin-top: 20px;
        }

        .vnpay-btn {
            margin-top: 20px;
        }
    </style>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/about-header-bg.jpg') }}')">
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
        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="page-title">
                        <h4 style="color: #c59d33">Xem lại giỏ hàng</h4>
                    </div>
                    <div class="col-lg-12">
                        <?php
                        $content = Cart::content();
                        ?>
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ config('app.base_url') . $v_content->options->feature_image_path }}"
                                                            alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{ $v_content->name }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">{{ number_format($v_content->price) }} VNĐ</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <form action="{{ URL::to('/update-cart-quantity') }}" method="GET">
                                                    {{ csrf_field() }}

                                                    <input class="form-control" type="number" name="cart_quantity"
                                                        value="{{ $v_content->qty }}" required autocomplete="off"
                                                        style="padding: 2px 6px; font-size: 10px;" min="1"
                                                        max="{{ $v_content->qty }}">
                                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                        class="form-control" style="padding: 2px 6px; font-size: 10px;">
                                                    <br>
                                                    <input type="submit" value="Cập nhật" name="update_qty"
                                                        class="form-control" style="padding: 2px 6px; font-size: 10px;">

                                                </form>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="total-col">
                                            {{ number_format($v_content->price * $v_content->qty) }}
                                            VNĐ</td>
                                        {{-- delete cart --}}
                                        <td class="remove-col"><a
                                                href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"
                                                class="btn-remove"><i class="icon-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                    </div>
                    <br>

                    <form action="{{ URL::to('/order-place') }}" method="POST">
                        {{ csrf_field() }}
                        <div id="accordion-payment">
                            <div class="card">
                                <div class="card-header" id="heading-3">
                                    <h2 class="card-title">
                                        <label>
                                            <input name="payment_option" value="2" type="checkbox"
                                                style="display: none;">
                                        </label>
                                    </h2>

                                </div>
                            </div>
                            <br>
                            <button type="submit" value="Đặt hàng" name="send_order_place"
                                class="btn btn-outline-primary-2 btn-order btn-block">
                                <img src="{{ asset('UserLTE/assets/images/chatbot/money.png') }}" alt=""
                                    style="width: 45px; height: auto">&ensp; <strong> Thanh Toán
                                    Khi Nhận Hàng</strong>
                            </button>
                        </div>
                    </form>

                    <form action="{{ url('/vnpay_payment') }}" method="POST">
                        <div class="vnpay-btn">
                            @csrf
                            <input type="hidden" name="total_vnpay" id="">
                            <button type="submit" name="redirect" class="btn btn-outline-primary-2 btn-order btn-block">
                                <img src="{{ asset('UserLTE/assets/images/chatbot/vnpay.png') }}" alt=""
                                    style="width: 40px; height: auto">&ensp; <strong> Thanh Toán
                                    Với VNPAY</strong>
                            </button>
                        </div>
                    </form>

                    <form action="{{ url('/momo_payment') }}" method="POST">
                        <div class="momo-btn">
                            @csrf
                            <input type="hidden" name="total_momo" id="">
                            <button type="submit" name="payUrl" class="btn btn-outline-primary-2 btn-order btn-block">
                                <img src="{{ asset('UserLTE/assets/images/chatbot/momo.png') }} " alt=""
                                    style="width: 30px; height: auto">&ensp; <strong>Thanh Toán
                                    Với MOMO</strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Find the checkbox with the name "payment_option" and the value "2"
        var paymentCheckbox = document.querySelector('input[name="payment_option"][value="2"]');

        // If the checkbox is found, automatically click it
        if (paymentCheckbox) {
            paymentCheckbox.click();
        }
    });
</script>
