@extends('layouts.master')

@section('title')
    <title>
        NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

<style>

</style>
@section('content')
    <div class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/demos/demo-3/slider/slideStore.jpg') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Cửa Hàng</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Cửa Hàng</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    {{-- Hiển thị sản phẩm --}}
                    <div class="col-lg-9" >
                        <div class="toolbox" style="border: 1px solid #e5e5e5; padding: 10px 15px 10px;">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Hiển thị <span>12 trên 36 </span> sản phẩm
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sắp xếp:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Mới</option>
                                            <option value="rating">Nổi bậc</option>
                                            <option value="date">Bán chạy</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a href="#" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="10" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="10" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout active">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="12" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                            <rect x="12" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>

                                    <a href="#" class="btn-layout">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4"></rect>
                                            <rect x="6" y="0" width="4" height="4"></rect>
                                            <rect x="12" y="0" width="4" height="4"></rect>
                                            <rect x="18" y="0" width="4" height="4"></rect>
                                            <rect x="0" y="6" width="4" height="4"></rect>
                                            <rect x="6" y="6" width="4" height="4"></rect>
                                            <rect x="12" y="6" width="4" height="4"></rect>
                                            <rect x="18" y="6" width="4" height="4"></rect>
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-4">
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <a href="{{ route('detail', $product->slug) }}">
                                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="{{ route('detail', $product->slug) }}">
                                                        {{ $product->name }}</a>
                                                </h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="old-price">Gốc: <del>{{ number_format($product->price) }}
                                                            VNĐ </del></span>
                                                    <span class="new-price">{{ number_format($product->sale_price) }}
                                                        VNĐ</span>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-4 -->
                                @endforeach
                            </div><!-- End .row -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            {{ $products->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </ul>
                            </nav>
                        </div><!-- End .products -->
                    </div>

                    {{-- Lọc sản phẩm new --}}
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean"><label>
                                    <h5 style="font-size: 1.8rem;"><strong><i class="fa fa-filter"></i> BỘ LỌC TÌM KIẾM</strong></h5>
                                </label></div><!-- End .widget widget-clean -->
                            <form id="filterForm" action="{{ url('/product_all') }}" method="get">


                                {{-- Lọc theo danh mục sản phẩm --}}
                                <div class="widget widget-collapsible">
                                    <h6 class="widget-title"><a data-toggle="collapse" href="#widget-2" role="button"
                                            aria-expanded="true" aria-controls="widget-2"><strong>Danh mục sản
                                                phẩm</strong></a></h6>
                                    <div class="collapse show" id="widget-2">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @foreach ($categories as $category)
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" name="selected_categories[]"
                                                                value="{{ $category->id }}" class="category-checkbox"
                                                                {{ in_array($category->id, (array) $request->input('selected_categories')) ? 'checked' : '' }}>
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Lọc theo hãng sản xuất --}}
                                <div class="widget widget-collapsible">
                                    <h6 class="widget-title"><a data-toggle="collapse" href="#widget-4" role="button"
                                            aria-expanded="true" aria-controls="widget-4"> <strong>Thương
                                                hiệu</strong></a></h6>
                                    <!-- End .widget-title -->
                                    <div class="collapse show" id="widget-4">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                @foreach ($tags as $tag)
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" name="product_tags[]"
                                                                value="{{ $tag->id }}" class="product-tag-checkbox"
                                                                {{ in_array($tag->id, request('product_tags', [])) ? 'checked' : '' }}>
                                                            {{ $tag->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                {{-- Lọc theo giá sản phẩm --}}
                                <div class="widget widget-collapsible">
                                    <h6 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                            aria-controls="widget-3">
                                            <strong>Theo giá</strong>
                                        </a>
                                    </h6>
                                    <div class="collapse show" id="widget-3">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input class="input-filter-price form-control form-control-sm min"
                                                        type="number" min="0" maxlength="13" placeholder="đ từ"
                                                        value="{{ request('min_price') }}"
                                                        onkeypress="return /[0-9]/i.test(event.key)">
                                                    <span class="mx-4">-</span>
                                                    <input class="input-filter-price form-control form-control-sm max"
                                                        type="number" min="0" maxlength="13" placeholder="đ đến"
                                                        value="{{ request('max_price') }}"
                                                        onkeypress="return /[0-9]/i.test(event.key)">
                                                </div>
                                                <div class="alert-filter-price text-primary mt-2 d-none">Vui lòng điền
                                                    khoảng giá phù hợp</div>
                                                <button type="button"
                                                    class="btn-filter-price btn btn-primary btn-sm mt-2">Áp Dụng</button>
                                            </div>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                {{-- Lọc theo đánh giá --}}
                                <form id="filterForm" method="GET" action="{{ route('product_all') }}">
                                    <div class="widget widget-collapsible">
                                        <h6 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-1" role="button"
                                                aria-expanded="true" aria-controls="widget-1">
                                                <strong>Theo đánh giá</strong>
                                            </a>
                                        </h6>
                                        <div class="collapse show" id="widget-1">
                                            <div class="widget-body">
                                                <div class="filter-items">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="cus-rating-{{ $i }}" name="ratings[]"
                                                                    value="{{ $i }}">
                                                                <label class="custom-control-label"
                                                                    for="cus-rating-{{ $i }}">
                                                                    <span class="ratings-container">
                                                                        <span class="ratings">
                                                                            <span class="ratings-val"
                                                                                style="width: {{ $i * 20 }}%;"></span><!-- End .ratings-val -->
                                                                        </span><!-- End .ratings -->
                                                                        <span
                                                                            class="ratings-text">({{ rand(2, 8) }})</span><!-- Random example count -->
                                                                    </span><!-- End .rating-container -->
                                                                </label>
                                                            </div><!-- End .custom-checkbox -->
                                                        </div><!-- End .filter-item -->
                                                    @endfor
                                                </div><!-- End .filter-items -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->
                                    {{-- Các phần lọc khác --}}
                                </form>

                                {{-- Banner --}}
                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="{{ asset('UserLTE/assets/images/demos/demo-3/banners/banner-6.png') }}"
                                                alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    {{-- lọc theo giá --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btnFilterPrice = document.querySelector('.btn-filter-price');

            btnFilterPrice.addEventListener('click', function() {
                var minPrice = document.querySelector('.input-filter-price.min').value;
                var maxPrice = document.querySelector('.input-filter-price.max').value;

                if (minPrice.trim() !== '' && maxPrice.trim() !== '' && parseInt(minPrice) <= parseInt(
                        maxPrice)) {
                    // Gửi yêu cầu lọc khi giá trị hợp lệ
                    var filterForm = document.getElementById('filterForm');
                    var priceRange = minPrice + '-' + maxPrice;
                    var priceRangeInput = document.createElement('input');
                    priceRangeInput.type = 'hidden';
                    priceRangeInput.name = 'price_range[]';
                    priceRangeInput.value = priceRange;
                    filterForm.appendChild(priceRangeInput);
                    filterForm.submit();
                } else {
                    // Hiển thị cảnh báo khi giá trị không hợp lệ
                    var alertFilterPrice = document.querySelector('.alert-filter-price');
                    alertFilterPrice.classList.remove('d-none');
                }
            });
        });
    </script>

    {{-- lọc theo tag --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tagCheckboxes = document.querySelectorAll('.product-tag-checkbox');

            tagCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Gửi yêu cầu lọc khi checkbox tag sản phẩm thay đổi
                    document.getElementById('filterForm').submit();
                });
            });
        });
    </script>

    {{-- Lọc theo danh mục --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categoryCheckboxes = document.querySelectorAll('.category-checkbox');

            categoryCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Gửi yêu cầu lọc khi checkbox danh mục sản phẩm thay đổi
                    document.getElementById('filterForm').submit();
                });
            });
        });
    </script>

    {{-- Lọc theo đánh giá --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ratingCheckboxes = document.querySelectorAll('input[name="ratings[]"]');

            ratingCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Gửi yêu cầu lọc khi checkbox đánh giá thay đổi
                    document.getElementById('filterForm').submit();
                });
            });
        });
    </script>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .btn-filter-price {
        width: 100%;
        margin-top: 20px;
    }

    .input-filter-price {
        width: 100px;
        text-align: center;
        font-size: 14px;
    }

    .widget-body .filter-items {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-filter-price {
        display: block;
        width: 100%;
    }

    .alert-filter-price {
        font-size: 14px;
    }

    @media (max-width: 576px) {
        .input-filter-price {
            width: 80px;
        }
    }
</style>
