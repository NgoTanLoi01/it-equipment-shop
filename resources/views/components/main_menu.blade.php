<div class="header-center">
    <nav class="main-nav">
        <ul class="menu sf-arrows">
            <li class="megamenu-container  ">
                <a href="{{ route('home') }}"><strong>Trang chủ</strong></a>
            </li>
            {{-- @foreach ($categorysLimit as $categoryParent)
                <li>
                    <a href="" class="sf-with-ul">
                        {{ $categoryParent->name }}
                    </a>
                    @include('components.child_menu', ['categoryParent' => $categoryParent])
                </li>
            @endforeach --}}
            <li>
                <a href="{{ URL::to('/product_all') }}" class="sf-with-ul"><strong>Cửa hàng</strong></a>
                <div class="megamenu megamenu-md">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="menu-col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="menu-title">Danh mục</div><!-- End .menu-title -->
                                        <ul>
                                            <li><a href="{{ URL::to('/product_all') }}">Laptop</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Đồng hồ thông minh</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Máy ảnh</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Phụ kiện</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}"><span>Tai nghe<span
                                                            class="tip tip-new">New</span></span></a></li>
                                            <li><a href="{{ URL::to('/product_all') }}"><span>Loa<span></a></li>
                                            <li><a href="{{ URL::to('/product_all') }}"><span>Chuột<span></a></li>
                                            <li><a href="{{ URL::to('/product_all') }}"><span>Bàn Phím<span
                                                            class="tip tip-hot">Hot</span></span></a></li>
                                        </ul>
                                    </div><!-- End .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="menu-title">Thương hiệu</div><!-- End .menu-title -->
                                        <ul>
                                            <li><a href="{{ URL::to('/product_all') }}"><span>Logitech<span
                                                class="tip tip-hot">hot</span></span></a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Tamayoko</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Apple</a></li>
                                            <li><a href="{{ URL::to('/product_all') }}">Acer</a></li>
                                        </ul>
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .menu-col -->
                        </div><!-- End .col-md-8 -->

                        <div class="col-md-4">
                            <div class="banner banner-overlay">
                                <a href="{{ URL::to('/product_all') }}" class="banner banner-menu">
                                    <img src="{{ asset('UserLTE/assets/images/menu/banner-1.jpg') }}" alt="Banner">

                                    <div class="banner-content banner-content-top">
                                        <div class="banner-title text-white">Sản
                                            <br>Phẩm<br><span><strong>Hot</strong></span>
                                        </div>
                                        <!-- End .banner-title -->
                                    </div><!-- End .banner-content -->
                                </a>
                            </div><!-- End .banner banner-overlay -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .megamenu megamenu-md -->
            </li>
            <li>
                <a href="{{ URL::to('/blog') }}" class=""><strong>Tin tức</strong></a>
            </li>
            <li>
                <a href="{{ URL::to('/about') }}" class=""><strong>Về chúng tôi</strong></a>
            </li>
            <li>
                <a href="{{ URL::to('/lien_he') }}" class=""><strong>Liên hệ</strong></a>
            </li>
        </ul><!-- End .menu -->
    </nav><!-- End .main-nav -->
</div><!-- End .header-center -->
