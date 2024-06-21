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
            style="background-image: url('{{ asset('UserLTE/assets/images/about-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Tìm Kiếm Sản Phẩm</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Tìm Kiếm Sản Phẩm</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <br>
        <div class="page-content">
            <div class="container">
                <div class="container featured">
                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                                @if ($noResults)
                                @else
                                    @foreach ($search_product as $keySelling => $productsSellingItem)
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <a href="{{ route('detail', $productsSellingItem->slug) }}">
                                                    <img src="{{ config('app.base_url') . $productsSellingItem->feature_image_path }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách
                                                            yêu thích</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    {{-- <a href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->category->name }}</a> --}}
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ asset('UserLTE/product') }}">{{ $productsSellingItem->name }}</a>
                                                </h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="old-price"> Gốc:
                                                        <del>{{ number_format($productsSellingItem->price) }}
                                                            VNĐ </del></span>
                                                    <span
                                                        class="new-price">{{ number_format($productsSellingItem->sale_price) }}
                                                        VNĐ</span>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                @endif
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div>
                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
@endsection
