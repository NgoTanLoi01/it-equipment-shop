<style>
    h6 {
        font-size: 12px;
    }
</style>
<div class="container featured">
    <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab"
                role="tab" aria-controls="products-featured-tab" aria-selected="true">Mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab"
                aria-controls="products-sale-tab" aria-selected="false">Đang Sale</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab"
                aria-controls="products-top-tab" aria-selected="false">Nổi bật</a>
        </li>

    </ul>

    <div class="tab-content tab-content-carousel">
        {{-- Sản phẩm mới --}}
        <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
            aria-labelledby="products-featured-link">
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

                @foreach ($products as $product)
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
                            <div class="product-cat">
                                <a href="{{ route('detail', $product->slug) }}"></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="#">{{ $product->name }}</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                @if ($product->price != $product->sale_price)
                                    <span class="old-price" style="font-size: 14px">Gốc: <del>{{ number_format($product->price) }} VNĐ
                                        </del></span>
                                    <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                                @else
                                    <span class="new-price">{{ number_format($product->price) }} VNĐ</span>
                                @endif
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        {{-- Sản phẩm đang sale --}}
        <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">
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
                @foreach ($productsOnSale as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <span class="product-label label-circle label-sale">-{{ $product->discount_percentage }}%</span>
                            <a href="{{ route('detail', $product->slug) }}">
                                <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                    alt="Product image" class="product-image">
                            </a>
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ route('detail', $product->slug) }}"></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="#">{{ $product->name }}</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="old-price" style="font-size: 14px">Gốc: <del>{{ number_format($product->price) }} VNĐ
                                    </del></span>
                                <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        {{-- Sản phẩm lượt xem nhiều --}}
        <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel" aria-labelledby="products-top-link">
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
                @foreach ($productsFeatures as $keySelling => $productsSellingItem)
                    <div class="product product-2">
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
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách
                                        yêu thích</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a
                                    href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->category->name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a
                                    href="{{ asset('UserLTE/product') }}">{{ $productsSellingItem->name }}</a></h3>
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
                            <h6 class="">Lượt xem: {{ $productsSellingItem->views_count }}</h6>
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->

    </div>
