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
            style="background-image: url('{{ asset('UserLTE/assets/images/oso.png') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Danh Sách Yêu Thích</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Danh Sách Yêu Thích</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><br><!-- End .page-header -->

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Tình trạng kho</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/1.png') }}"
                                                alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">Đồng hồ thông minh Apple Watch</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">4,480,000 VNĐ</td>
                            <td class="stock-col"><span class="in-stock">10 sản phẩm có sẵn</span></td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Lựa chọn phương án
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Thêm vào giỏ hàng</a>
                                        <a class="dropdown-item" href="#">Thanh toán sản phẩm</a>
                                    </div>
                                </div>
                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                        </tr>
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/2.jpg') }}"
                                                alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">Đồng Hồ Thông Minh Y33h 4G</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">900,000 VNĐ</td>
                            <td class="stock-col"><span class="in-stock">10 sản phẩm có sẵn</span></td>
                            <td class="action-col">
                                <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Thêm vào giỏ hàng</button>
                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                        </tr>
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/3.jpg') }}"
                                                alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">Loa Bluetooth Không dây Marshall WOBURN III</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">5,960,000 VNĐ</td>
                            <td class="stock-col"><span class="out-of-stock">0 sản phẩm có sẵn</span></td>
                            <td class="action-col">
                                <button class="btn btn-block btn-outline-primary-2 disabled">Hết hàng</button>
                            </td>
                            <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                        </tr>
                    </tbody>
                </table><!-- End .table table-wishlist -->
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Chia sẻ:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
