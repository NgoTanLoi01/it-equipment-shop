<div class="container top">

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title">Ưu đãi lớn</h2><!-- End .title -->
            <p class="title-desc">Ưu đãi hôm nay và hơn thế nữa</p><!-- End .title-desc -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-lg-6 deal-col">
                <div class="deal"
                    style="background-image: url('{{ asset('UserLTE/assets/images/demos/demo-4/deal/bg-1.jpg') }}');">
                    <div class="deal-top">
                        <h2>Ưu đãi trong ngày.</h2>
                        <h4>Số lượng hạn chế. </h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Loa thông minh có Google Assistant</a></h3>
                        <!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">3,490,000 VNĐ</span>
                            <span class="old-price">Gốc <del>4,490,000 VNĐ</del></span>
                        </div><!-- End .product-price -->

                        {{-- <a href="product.html" class="btn btn-link"><span>Shop Now</span><i class="icon-long-arrow-right"></i></a> --}}
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div>
                        <!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 deal-col">
                <div class="deal"
                    style="background-image: url('{{ asset('UserLTE/assets/images/demos/demo-4/deal/bg-2.jpg') }}');">
                    <div class="deal-top">
                        <h2>Ưu đãi hàng tuần.</h2>
                        <h4>Số lượng hạn chế.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Sạc không dây dành cho iPhone / Android</a>
                        </h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">999,000 VNĐ</span>
                        </div><!-- End .product-price -->

                        {{-- <a href="login.html" class="btn btn-link"><span>Sign In and Save money</span><i class="icon-long-arrow-right"></i></a> --}}
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="more-container text-center mt-1 mb-5">
            <a href="{{ URL::to('/product_all') }}" class="btn btn-outline-dark-2 btn-round btn-more"><span>Xem thêm sản phẩm</span><i
                    class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Sản phẩm bán chạy</h2><!-- End .title -->
        </div><!-- End .heading-left -->
    </div><!-- End .heading -->
    {{-- Sản phẩm bán chạy --}}
    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                "nav": true, 
                "dots": false,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
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
                        "items":5
                    }
                }
            }'>
                @foreach ($productsSelling as $product)
                    <div class="product product-2">

                        <figure class="product-media">
                            <a href="{{ route('detail', $product->slug) }}">
                                <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                    alt="Product image" class="product-image">
                            </a>
                            @if ($product->price > $product->sale_price)
                                @php
                                    $discount_percentage = round(
                                        (($product->price - $product->sale_price) /
                                            $product->price) *
                                            100,
                                    );
                                @endphp
                                <span class="product-label label-circle label-sale">-{{ $discount_percentage }}%
                                </span>
                            @endif
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách
                                        yêu thích</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->
                        <div class="product-body">
                            {{-- <div class="product-cat">
                                <a href="{{ route('detail', $product->slug) }}">{{ $product->name }}</a>
                            </div><!-- End .product-cat --> --}}
                            <h3 class="product-title">
                                <a href="{{ asset('UserLTE/product') }}">{{ $product->name }}</a>
                            </h3><!-- End .product-title -->

                            <div class="product-price">
                                @if ($product->price != $product->sale_price)
                                    <span class="old-price"> Gốc:
                                        <del>{{ number_format($product->price) }}
                                            VNĐ</del></span>
                                    <span class="new-price">{{ number_format($product->sale_price) }}
                                        VNĐ</span>
                                @else
                                    <span class="new-price">{{ number_format($product->price) }}
                                        VNĐ</span>
                                @endif
                            </div><!-- End .product-price -->
                            <h6>Số lượng đã bán: {{ $productSalesQuantity[$product->id] ?? 0 }}</h6>
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach


            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->

</div>
