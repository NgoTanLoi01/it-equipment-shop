@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <style>
        /* Add this CSS to your main CSS file or in a style block in your Blade file */

        .compare-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .compare-table th,
        .compare-table td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #e976a2;
        }

        .compare-table th {
            background-color: #fff;
            font-weight: bold;
        }

        .compare-table img {
            max-width: 80%;
            height: auto;
        }

        .compare-table .btn {
            text-decoration: none;
            padding: 10px 20px;
            color: #fff;
            background-color: #e976a2;
            border: none;
            border-radius: 5px;
        }

        .compare-table .btn:hover {
            background-color: #e976a2;
        }

        .product-image-title {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-image-title .title {
            margin-top: 10px;
            text-align: center;
        }
        img{
            display: inline;
        }
    </style>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ asset('UserLTE/assets/images/oso.png') }}')">
            <div class="container">
                <h1 class="page-title"><strong>So Sánh Sản Phẩm</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>So Sánh Sản Phẩm</strong></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <br>

        <div class="page-content pb-0">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered compare-table">
                        <tbody>
                            <!-- Hình ảnh -->
                            <tr>
                                <th style="width:10%; color:black;">Hình ảnh</th>
                                @foreach ($products as $product)
                                    <td style="width:30%; vertical-align:unset;">
                                        <div class="product-image-title">
                                            <a class="product-image" href="{{ route('detail', $product->slug) }}">
                                                <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Tên sản phẩm -->
                            <tr>
                                <th style="width:10%; color:black;">Tên sản phẩm</th>
                                @foreach ($products as $product)
                                    <td style="width:30%; vertical-align:unset;">
                                        <div class="product-image-title">
                                            <h5 class="title">
                                                <a class="view-hover" style="color: #e976a2; font-size: 16px" href="{{ route('detail', $product->slug) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Mô tả -->
                            <tr>
                                <th style="color:black;">Mô tả / <br>Thông số</th>
                                @foreach ($products as $product)
                                    <td style="vertical-align:unset; color:black;">
                                        <div style="text-align:justify; ">
                                            {!! $product->content !!}
                                        </div>
                                    </td>
                                @endforeach
                            </tr>

                            <!-- Giá -->
                            <tr>
                                <th style="color:black;">Giá</th>
                                @foreach ($products as $product)
                                    <td><span class="current-price text-primary"><strong
                                                style="color: #e976a2">{{ number_format($product->sale_price) }}
                                                VNĐ</strong></span></td>
                                @endforeach
                            </tr>

                            <!-- Xem chi tiết -->
                            <tr>
                                <th style="color:black;">Xem chi tiết</th>
                                @foreach ($products as $product)
                                    <td>
                                        <a href="{{ route('detail', $product->slug) }}" class="btn btn-primary"><strong>Xem
                                                chi tiết</strong></a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
