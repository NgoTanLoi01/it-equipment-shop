<div class="container trending">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Danh mục thịnh hành</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                @php
                    $activeTab = true; // Biến để kiểm soát tab đang active
                @endphp
                @foreach ($categorys as $indexCategory => $categoryItem)
                    <li class="{{ $indexCategory == 0 ? 'nav-item' : '' }}">
                        <a class="nav-link {{ $activeTab ? 'active' : '' }}" id="trending-tab-{{ $categoryItem->id }}"
                            data-toggle="tab" href="#category_tab_{{ $categoryItem->id }}" role="tab"
                            aria-controls="category_tab_{{ $categoryItem->id }}"
                            aria-selected="{{ $activeTab ? 'true' : 'false' }}">
                            {{ $categoryItem->name }}
                        </a>
                        @php
                            $activeTab = false; // Chuyển tab active về false sau khi sử dụng
                        @endphp
                    </li>
                @endforeach
            </ul>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="row">
        <div class="col-xl-5col d-none d-xl-block">
            <div class="banner">
                <img src="UserLTE/assets/images/demos/demo-3/banners/banner-5.png" alt="banner">
            </div><!-- End .banner -->
        </div><!-- End .col-xl-5col -->

        <div class="col-xl-4-5col">
            <div class="tab-content tab-content-carousel just-action-icons-sm">
                @foreach ($categorys as $indexCategoryProduct => $categoryItemProduct)
                    <div class="tab-pane p-0 fade {{ $indexCategoryProduct == 0 ? 'show active' : '' }}"
                        id="category_tab_{{ $categoryItemProduct->id }}" role="tabpanel"
                        aria-labelledby="trending-tab-{{ $categoryItemProduct->id }}">
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
                                    }
                                }
                            }'>
                            @foreach ($categoryItemProduct->products as $productItemTabs)
                                <div class="product {{ $indexCategoryProduct == 0 ? 'product-2' : '' }}">

                                    <figure class="product-media">
                                        <a href="{{ route('detail', $productItemTabs->slug) }}">
                                            <img src="{{ config('app.base_url') . $productItemTabs->feature_image_path }}"
                                                alt="Product image" class="product-image">
                                        </a>
                                        @if ($productItemTabs->price > $productItemTabs->sale_price)
                                            @php
                                                $discount_percentage = round(
                                                    (($productItemTabs->price - $productItemTabs->sale_price) /
                                                        $productItemTabs->price) *
                                                        100,
                                                );
                                            @endphp
                                            <span
                                                class="product-label label-circle label-sale">-{{ $discount_percentage }}%
                                            </span>
                                        @endif
                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách
                                                    yêu thích</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{ route('detail', $productItemTabs->slug) }}">
                                                <!-- Thêm đường dẫn tương ứng -->
                                                {{ $productItemTabs->category_name }}
                                            </a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title">
                                            <a href="product.html">
                                                {{ $productItemTabs->name }}
                                            </a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if ($productItemTabs->price != $productItemTabs->sale_price)
                                                <span class="old-price" style="font-size: 14px"> Gốc:
                                                    <del>{{ number_format($productItemTabs->price) }}
                                                        VNĐ</del></span>
                                                <span
                                                    class="new-price">{{ number_format($productItemTabs->sale_price) }}
                                                    VNĐ</span>
                                            @else
                                                <span
                                                    class="new-price">{{ number_format($productItemTabs->price) }}
                                                    VNĐ</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endforeach
            </div><!-- End .tab-content -->
        </div><!-- End .col-xl-4-5col -->
    </div><!-- End .row -->
</div>
