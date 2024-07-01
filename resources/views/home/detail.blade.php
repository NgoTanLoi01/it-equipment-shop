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
                <h1 class="page-title"><strong>Chi Tiết Sản Phẩm</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Chi Tiết Sản Phẩm</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><br><!-- End .page-header -->
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Chi tiết sản phẩm</a></li>
            </ol>

            <nav class="product-pager ml-auto" aria-label="Product">
                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                    <i class="icon-angle-left"></i>
                    <span>Trước đó</span>
                </a>

                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                    <span>Tiếp theo</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav><!-- End .pager-nav -->
        </div><br>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        {{-- Chi tiết sản phẩm --}}
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{ $product->feature_image_path }}"
                                                data-zoom-image="{{ $product->feature_image_path }}" alt="product image">
                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{ $product->feature_image_path }}"
                                                data-zoom-image="{{ $product->feature_image_path }}">
                                                <img src="{{ $product->feature_image_path }}" alt="product side">
                                            </a>

                                            @foreach ($product->images as $item)
                                                <a class="product-gallery-item" href="#"
                                                    data-image="{{ $item->image_path }}"
                                                    data-zoom-image="{{ $item->image_path }}">
                                                    <img src="{{ $item->image_path }}" alt="product side">
                                                </a>
                                            @endforeach
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details product-details-sidebar">
                                        <h1 style="font-size: 18px; font-weight: bold;">{{ $product->name }}</h1>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            @if ($product->price > $product->sale_price)
                                                @php
                                                    $discount_percentage = round(
                                                        (($product->price - $product->sale_price) / $product->price) *
                                                            100,
                                                    );
                                                @endphp
                                                <span class="old-price" style="font-size: 14px;"> Gốc:
                                                    <del>{{ number_format($product->price) }} VNĐ</del></span><br>
                                                <span class="new-price"
                                                    style="font-size: 20px; font-weight: bold">{{ number_format($product->sale_price) }}
                                                    VNĐ</span>
                                            @else
                                                <br><span class="new-price"
                                                    style="font-size: 20px; font-weight: bold">{{ number_format($product->price) }}
                                                    VNĐ</span>
                                            @endif
                                        </div><!-- End .product-price -->

                                        <strong>Đã Bán: </strong><label for="qty"
                                            style="color: #982029">{{ $totalSold }} sản phẩm </label><br>
                                        <strong>Còn Lại: </strong><label for="qty"
                                            style="color: #982029">{{ $product->quantity }} sản phẩm</label><br>
                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <form action="{{ URL::to('/save-cart') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="details-filter-row details-row-size">
                                                        <label>Số lượng:</label>
                                                        <div class="product-details-quantity">
                                                            <input type="number" name="qty" id="qty"
                                                                class="form-control" value="1" min="1"
                                                                max="{{ $product->quantity }}" step="1"
                                                                data-decimals="0" required>
                                                        </div><!-- End .product-details-quantity -->
                                                    </div><!-- End .details-filter-row -->

                                                    <input name="productid_hidden" type="hidden" class="form-control"
                                                        value="{{ $product->id }}">
                                                    <button type="submit" class="btn-product btn-cart"><span>Thêm vào giỏ
                                                            hàng</span></button>
                                                </form>
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist"
                                                    title="Wishlist"><span>Thêm vào yêu thích</span></a>
                                                <a href="#" class="btn-product btn-compare"
                                                    title="Compare"><span>So
                                                        sánh sản phẩm</span></a>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer details-footer-col">
                                            <div class="social-icons social-icons-sm">
                                                <span class="social-label">Share:</span>
                                                <a href="#" class="social-icon" title="Facebook"
                                                    target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                        class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram"
                                                    target="_blank"><i class="icon-instagram"></i></a>
                                                <a href="#" class="social-icon" title="Pinterest"
                                                    target="_blank"><i class="icon-pinterest"></i></a>
                                            </div><!-- End .social-icons -->
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->
                        {{-- Mô tả sản phẩm --}}
                        <div class="product-details-tab">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                        href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                        aria-selected="true"><strong>Mô tả sản phẩm </strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                        href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                        aria-selected="false"><strong>Vận chuyển &amp;
                                            Trả hàng </strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-review-link" data-toggle="tab"
                                        href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                        aria-selected="false"><strong>Đánh giá sản phẩm
                                            ({{ $product->reviews->count() }}) </strong></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                    aria-labelledby="product-desc-link">
                                    <div class="product-desc-content">
                                        <h3>Mô tả sản phẩm</h3>
                                        {!! $product->content !!}
                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                    aria-labelledby="product-shipping-link">
                                    <div class="product-desc-content">
                                        <h3>Chính sách vận chuyển &amp; trả hàng</h3>
                                        <p><b>*</b> Chúng tôi giao hàng đến tất cả các tỉnh thành trên lãnh thổ Việt Nam. Để
                                            biết
                                            chi tiết
                                            đầy đủ về các
                                            tùy chọn giao hàng mà chúng tôi cung cấp, vui lòng xem <a href="#">Thông
                                                tin giao
                                                hàng</a><br><br>
                                            <b>*</b> Chúng tôi hy vọng bạn sẽ thích mỗi lần mua hàng nhưng nếu cần trả lại
                                            một mặt
                                            hàng, bạn
                                            có thể thực hiện việc đó trong vòng 7 ngày kể từ khi nhận nếu có lỗi do nhà sản
                                            xuất. Để
                                            biết chi tiết đầy đủ về
                                            cách thực hiện hoàn trả hàng, vui lòng xem <a href="#">Thông tin trả
                                                hàng</a>
                                        </p>
                                    </div><!-- End .product-desc-content -->
                                </div>

                                {{-- Phần Đánh giá sản phẩm --}}
                                <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                    aria-labelledby="product-review-link">
                                    {{-- Hiển thị đánh giá của khách hàng --}}
                                    <div class="reviews">
                                        <h3><strong>Đánh giá ({{ $product->reviews->count() }})</strong></h3>
                                        @foreach ($product->reviews as $review)
                                            <div class="review">
                                                <div class="row no-gutters">
                                                    <div class="col-auto">
                                                        <h4><a href="#">{{ $review->reviewer_name }}</a></h4>
                                                        <div class="ratings-container">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <li class="star-customer" title="{{ $i }}"
                                                                        data-value="{{ $i }}">
                                                                        <i class="fa fa-star"
                                                                            style="font-size: 14px; min-width: 18px; {{ $i <= $review->rating ? 'color: #ffc107;' : '' }}"></i>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </div><!-- End .rating-container -->
                                                        <span
                                                            class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                                    </div><!-- End .col -->
                                                    <div class="col">
                                                        <h4 style="font-weight: bold">{{ $review->review_title }}</h4>
                                                        <div class="review-content">
                                                            <p>{{ $review->review_text }}</p>
                                                        </div><!-- End .review-content -->
                                                        <div class="review-action">
                                                            <a href="#"><i class="icon-thumbs-up"></i>Thích (2)</a>
                                                            <a href="#"><i class="icon-thumbs-down"></i>Không thích
                                                                (0)
                                                            </a>
                                                        </div><!-- End .review-action -->
                                                    </div><!-- End .col-auto -->
                                                </div><!-- End .row -->
                                            </div><!-- End .review -->
                                        @endforeach
                                    </div><br><!-- End .reviews -->

                                    {{-- Phần viết đánh giá của khách hàng --}}
                                    <div class="review-form">
                                        <h4><strong>Viết đánh giá của bạn về sản phẩm</strong></h4>
                                        <br>
                                        <form action="{{ route('detail.storeReview', $product->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="customer_id"
                                                value="{{ $customer_info->customer_id }}">
                                            <input type="hidden" name="rating" id="rating" value="1">
                                            <!-- Trường ẩn để lưu rating -->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="review-name">Tên</label>
                                                        <input type="text" id="review-name" name="reviewer_name"
                                                            class="form-control"
                                                            value="{{ $customer_info->customer_name ?? '' }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="review-phone">Số điện thoại</label>
                                                        <input type="text" id="review-phone" name="reviewer_phone"
                                                            class="form-control"
                                                            value="{{ $customer_info->customer_phone ?? '' }}"
                                                            placeholder="Ex: 0123456789" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="review-rating">Rating</label>
                                                <ul id="review-rating" class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li class="star" title="{{ $i }}"
                                                            data-value="{{ $i }}">
                                                            <i class="fa fa-star" style="min-width: 85px;"></i>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>

                                            <div class="form-group">
                                                <label for="review-title">Tiêu đề đánh giá</label>
                                                <input type="text" id="review-title" name="review_title"
                                                    class="form-control" placeholder="Ex: Tốt, sản phẩm đẹp,..." required>
                                            </div>

                                            <div class="form-group">
                                                <label for="review-content">Nội dung đánh giá (1500 ký tự)</label>
                                                <textarea id="review-content" name="review_text" class="form-control"
                                                    placeholder="Viết nội dung đánh giá của bạn ở đây..." required maxlength="1500"></textarea>
                                            </div>

                                            <div class="form-group">
                                                @if ($can_review)
                                                    <button class="btn btn-dark" type="submit">Gửi đánh giá</button>
                                                @else
                                                    <strong style="font-size: 18px; color: #fcb941">Bạn chỉ có thể đánh
                                                        giá sản phẩm sau khi đã mua.</strong>
                                                @endif
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-details-tab -->
                    </div><!-- End .col-lg-9 -->
                    {{-- Sản phẩm gợi ý mua cùng --}}
                    <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h5 style="font-size: 14px; font-weight: bold;"><strong>Sản Phẩm Thường Được Mua
                                        Cùng</strong></h5>
                                @foreach ($productsBoughtTogether as $product)
                                    <div class="products">
                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('detail', $product->slug) }}">
                                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a
                                                        href="{{ route('detail', $product->slug) }}">{{ $product->name }}</a>
                                                </h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    @if ($product->price != $product->sale_price)
                                                        <span class="old-price" style="font-size: 14px"> Gốc:
                                                            <del>{{ number_format($product->price) }} VNĐ</del></span>
                                                        <span class="new-price">{{ number_format($product->sale_price) }}
                                                            VNĐ</span>
                                                    @else
                                                        <span class="new-price">{{ number_format($product->price) }}
                                                            VNĐ</span>
                                                    @endif
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->
                                    </div><!-- End .products -->
                                @endforeach
                                <a href="{{ URL::to('/product_all') }}" class="btn btn-outline-dark-3"><span>Xem Thêm Sản
                                        Phẩm</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .widget widget-products -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">Banner Quảng Cáo</div><!-- End .ad-title -->

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/banner.jpg') }}"
                                            alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-product -->
                    </aside><!-- End .col-lg-3 -->


                </div><!-- End .row -->

                <div class="col-12">
                    {{-- Sản phẩm cùng danh mục --}}
                    <h2 class="title text-center mb-4">Bạn Cũng Có Thể Thích</h2><!-- End .title text-center -->
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @foreach ($related as $keySelling => $productsSellingItem)
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="{{ route('detail', $productsSellingItem->slug) }}">
                                        <img src="{{ config('app.base_url') . $productsSellingItem->feature_image_path }}"
                                            alt="Product image" class="product-image">
                                    </a>
                                    @if ($productsSellingItem->price > $productsSellingItem->sale_price)
                                        @php
                                            $discount_percentage = round(
                                                (($productsSellingItem->price - $productsSellingItem->sale_price) /
                                                    $productsSellingItem->price) *
                                                    100,
                                            );
                                        @endphp
                                        <span class="product-label label-circle label-sale">-{{ $discount_percentage }}%
                                        </span>
                                    @endif
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Danh
                                                sách
                                                yêu thích</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->name }}</a>
                                    </h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        @if ($productsSellingItem->price != $productsSellingItem->sale_price)
                                            <span class="old-price" style="font-size: 14px"> Gốc:
                                                <del>{{ number_format($productsSellingItem->price) }}
                                                    VNĐ</del></span>
                                            <span class="new-price">{{ number_format($productsSellingItem->sale_price) }}
                                                VNĐ</span>
                                        @else
                                            <span class="new-price">{{ number_format($productsSellingItem->price) }}
                                                VNĐ</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
<style>
    /* CSS cho các sao */
    .rating {
        display: flex;
        flex-direction: row;
        cursor: pointer;
        margin-bottom: 15px;

        /* Thêm khoảng cách dưới để các thành phần không dính vào nhau */
    }

    .rating .star {
        font-size: 23px;
        color: #ccc;
        margin: 0 5px;
        /* Tăng khoảng cách giữa các sao */
        cursor: pointer;
    }

    .rating .star.selected,
    .rating .star:hover {
        color: #f4c150;

    }

    .product-main-image img {
        border: 3px solid #f00;
        /* Viền màu đỏ */
        padding: 5px;
        border-radius: 10px;
        /* Góc viền bo tròn */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng đổ bóng */
    }

    .review-form .form-group {
        margin-bottom: 20px;
        /* Tăng khoảng cách giữa các nhóm form */
    }

    .review-form .form-group label {
        font-weight: bold;
        margin-bottom: 10px;
        /* Tăng khoảng cách giữa nhãn và trường input */
    }

    .review-form .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .review-form .btn {
        background-color: #fcb941;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    .review-form .btn:hover {
        background-color: #e9dd57;
    }

    /* CSS cho phần hiển thị đánh giá */
    .reviews .review {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        /* Tăng khoảng cách giữa các đánh giá */
        background-color: #f9f9f9;
    }

    .reviews .review h4 a {
        font-weight: bold;
        text-decoration: none;
        color: #343a40;
    }

    .reviews .review .ratings-container {
        margin-bottom: 10px;
        box-sizing: content-box;
        /* Tăng khoảng cách giữa sao và ngày đánh giá */
    }

    .reviews .review .review-date {
        color: #888;
        font-size: 12px;
    }

    .reviews .review .review-content {
        margin-top: 15px;
    }

    .reviews .review .review-action a {
        text-decoration: none;
        color: #f4c150;
        margin-right: 15px;
    }

    .reviews .review .review-action a:hover {
        text-decoration: underline;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var stars = document.querySelectorAll('.rating .star');
        var selectedValue = 0;

        stars.forEach(function(star, index) {
            star.addEventListener('click', function() {
                selectedValue = index + 1;
                document.getElementById('rating').value =
                    selectedValue; // Cập nhật giá trị rating vào trường ẩn
                updateStars(selectedValue);
            });

            star.addEventListener('mouseover', function() {
                updateStars(index + 1);
            });

            star.addEventListener('mouseleave', function() {
                updateStars(selectedValue);
            });
        });

        function updateStars(value) {
            stars.forEach(function(star, index) {
                if (index < value) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }
    });
</script>
