@extends('layouts.master')

@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

@section('content')
    <div class="main">
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    <form id="filterForm" action="{{ url('/product_all') }}" method="get">
                        {{-- Lọc giá --}}
                        <div class="mb-3">
                            <label><strong> Mức giá:</strong></label>
                            <div>
                                <label>
                                    <input type="checkbox" name="price_range[]" value="0-100000000"
                                        class="price-range-checkbox"
                                        {{ in_array('0-100000000', request('price_range', [])) ? 'checked' : '' }}>
                                    Tất cả
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="price_range[]" value="0-3000000"
                                        class="price-range-checkbox"
                                        {{ in_array('0-3000000', request('price_range', [])) ? 'checked' : '' }}>
                                    Dưới 3 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="price_range[]" value="3000000-8000000"
                                        class="price-range-checkbox"
                                        {{ in_array('3000000-8000000', request('price_range', [])) ? 'checked' : '' }}>
                                    Từ 3 đến 8 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="price_range[]" value="8000000-15000000"
                                        class="price-range-checkbox"
                                        {{ in_array('8000000-15000000', request('price_range', [])) ? 'checked' : '' }}>
                                    Từ 8 đến 15 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="price_range[]" value="15000000-100000000"
                                        class="price-range-checkbox"
                                        {{ in_array('15000000-100000000', request('price_range', [])) ? 'checked' : '' }}>
                                    Trên 15 triệu
                                </label>
                            </div>
                        </div>

                        {{-- Lọc Hãng sản xuất --}}
                        <div class="mb-3">
                            <label><strong>Hãng sản xuất:</strong></label>
                            @foreach ($tags as $tag)
                                <div>
                                    <label>
                                        <input type="checkbox" name="product_tags[]" value="{{ $tag->id }}"
                                            class="product-tag-checkbox"
                                            {{ in_array($tag->id, request('product_tags', [])) ? 'checked' : '' }}>
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </form>
                    <div class="col-lg-9">
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
                                    </div><!-- End .col-sm-6 -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- lọc theo giá --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.price-range-checkbox');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Gửi yêu cầu lọc khi checkbox thay đổi
                    document.getElementById('filterForm').submit();
                });
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
@endsection