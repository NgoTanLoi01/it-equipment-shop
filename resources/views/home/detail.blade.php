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
                                        <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                        <div class="product-price">
                                            <span class="old-price"> Gốc: <del>{{ number_format($product->price) }}
                                                    VNĐ</del></span>
                                        </div><!-- End .product-price -->
                                        <div class="product-price">
                                            <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                                        </div><!-- End .product-price -->
                                        <label for="qty">{{ $product->quantity }} sản phẩm có sẵn</label>
                                        <div class="details-filter-row details-row-size">
                                            <label>Số lượng:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" name="qty" id="qty" class="form-control"
                                                    value="1" min="1" max="{{ $product->quantity }}"
                                                    step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <form action="{{ URL::to('/save-cart') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="productid_hidden" type="hidden" class="form-control"
                                                        value="{{ $product->id }}">
                                                    <button type="submit" class="btn-product btn-cart"><span>Thêm vào giỏ
                                                            hàng</span></button>
                                                </form>
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist"
                                                    title="Wishlist"><span>Thêm vào yêu thích</span></a>
                                                <a href="#" class="btn-product btn-compare" title="Compare"><span>So
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
                                        aria-selected="true">Mô tả sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                        href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                        aria-selected="false">Vận chuyển &amp;
                                        Trả hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-review-link" data-toggle="tab"
                                        href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                        aria-selected="false">Đánh giá sản phẩm
                                        (2)</a>
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
                                <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                    aria-labelledby="product-review-link">
                                    <div class="reviews">
                                        <h3><strong>Đánh giá (2)</strong></h3>
                                        <div class="review">

                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">Hoàng Nam Trần</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 80%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                    <span class="review-date">6 ngày trước</span>
                                                </div><!-- End .col -->
                                                <div class="col">
                                                    <h4>Tốt, sản phẩm đẹp</h4>

                                                    <div class="review-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                            cum
                                                            dolores assumenda asperiores facilis porro reprehenderit animi
                                                            culpa
                                                            atque blanditiis commodi perspiciatis doloremque, possimus,
                                                            explicabo,
                                                            autem fugit beatae quae voluptas!</p>
                                                    </div><!-- End .review-content -->

                                                    <div class="review-action">
                                                        <a href="#"><i class="icon-thumbs-up"></i>Thích (2)</a>
                                                        <a href="#"><i class="icon-thumbs-down"></i>Không thích
                                                            (0)</a>
                                                    </div><!-- End .review-action -->
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->

                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">Nguyễn Văn A</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                    <span class="review-date">5 ngày trước</span>
                                                </div><!-- End .col -->
                                                <div class="col">
                                                    <h4>Rất tốt</h4>

                                                    <div class="review-content">
                                                        <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum
                                                            blanditiis
                                                            laudantium iste amet. Cum non voluptate eos enim, ab cumque nam,
                                                            modi,
                                                            quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                    </div><!-- End .review-content -->

                                                    <div class="review-action">
                                                        <a href="#"><i class="icon-thumbs-up"></i>Thích (0)</a>
                                                        <a href="#"><i class="icon-thumbs-down"></i>Không thích
                                                            (0)</a>
                                                    </div><!-- End .review-action -->
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->
                                    </div><br><!-- End .reviews -->

                                    <div class="review">

                                        <h4><strong>Viết đánh giá của bạn về sản phẩm</strong></h4>
                                        <br>
                                        <form action="#">
                                            <div class="row no-gutters">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="review-name">Tên</label>
                                                            <input type="text" id="review-name" class="form-control"
                                                                placeholder="Nhập tên của bạn" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="review-email">Số điện thoại</label>
                                                            <input type="text" id="review-email" class="form-control"
                                                                placeholder="0123456789" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="review-rating">Rating</label>
                                                    <ul id="review-rating" class="rating">
                                                        <li class="star" title="Poor" data-value="1"><i
                                                                class="fa fa-star "></i></li>
                                                        <li class="star" title="Fair" data-value="2"><i
                                                                class="fa fa-star "></i></li>
                                                        <li class="star" title="Good" data-value="3"><i
                                                                class="fa fa-star "></i></li>
                                                        <li class="star" title="Very Good" data-value="4"><i
                                                                class="fa fa-star "></i></li>
                                                        <li class="star" title="Excellent" data-value="5"><i
                                                                class="fa fa-star "></i></li>
                                                    </ul>
                                                    <div class="form-group">
                                                        <label for="review-content">Tiêu đề</label>
                                                        <input type="text" id="review-content-title"
                                                            class="form-control" placeholder="Tốt, sản phẩm đẹp,..."
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="review-content">Đánh giá (1500 ký tự)</label>
                                                        <textarea id="review-content" class="form-control" placeholder="Viết nội dung đánh giá của bạn ở đây..." required
                                                            maxlength="1500"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-dark">Gửi đánh giá</button>
                                                    </div>
                                                </div>
                                            </div><!-- End .row -->
                                        </form>
                                    </div><!-- End .review -->

                                </div>
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-details-tab -->

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

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm vào
                                                    danh sách yêu thích</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Xem nhanh"><span>Xem nhanh</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ
                                                    hàng</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a
                                                href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->name }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="old-price"> Gốc:
                                                <del>{{ number_format($productsSellingItem->price) }}
                                                    VNĐ</del></span>
                                            <span class="new-price">{{ number_format($productsSellingItem->sale_price) }}
                                                VNĐ</span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-lg-9 -->

                    {{-- Sản phẩm gợi ý mua cùng --}}
                    <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">Sản phẩm liên quan</h4><!-- End .widget-title -->
                                <div class="products">
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/1.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="#">Light brown studded Wide fit
                                                    wedges</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$110.00</span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/2.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="#">Yellow button front tea
                                                    top</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $56.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/3.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="#">Beige metal hoop tote bag</a>
                                            </h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $50.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/4.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="#">Black soft RI weekend travel
                                                    bag</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $75.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('UserLTE/assets/images/demos/demo-3/products/4.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="#">Black soft RI weekend travel
                                                    bag</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $75.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->
                                </div><!-- End .products -->
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
    }

    .rating .star {
        font-size: 23px;
        color: #ccc;
        margin: 0 2px;
        cursor: pointer;
        min-width: 128px;
    }

    .rating .star.selected,
    .rating .star:hover~.star {
        color: #f4c150;
    }

    .product-main-image img {
        border: 3px solid #f00;
        /* Viền màu đỏ */
        padding: 5 border-radius: 10px;
        /* Góc viền bo tròn */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng đổ bóng */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var stars = document.querySelectorAll('.rating .star');
        var selectedValue = 0;

        stars.forEach(function(star, index) {
            star.addEventListener('click', function() {
                selectedValue = index + 1;
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
</script> --}}
