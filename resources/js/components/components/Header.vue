<template>
    <header>
        <div class="page-wrapper">
            <header class="header header-intro-clearance header-3">
                <div class="header-top">
                    <div class="container">
                        <div class="header-left">
                            <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                        </div><!-- End .header-left -->
                        <div class="header-right">
                            <ul class="top-menu">
                                <li>
                                    <a href="#">Links</a>
                                    <ul>
                                        <li>
                                            <div class="header-dropdown">
                                                <a href="#">USD</a>
                                                <div class="header-menu">
                                                    <ul>
                                                        <li><a href="#">Eur</a></li>
                                                        <li><a href="#">Usd</a></li>
                                                    </ul>
                                                </div><!-- End .header-menu -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="header-dropdown">
                                                <a href="#">English</a>
                                                <div class="header-menu">
                                                    <ul>
                                                        <li><a href="#">English</a></li>
                                                        <li><a href="#">French</a></li>
                                                        <li><a href="#">Spanish</a></li>
                                                    </ul>
                                                </div><!-- End .header-menu -->
                                            </div>
                                        </li>
                                        <li>
                                            <router-link to="/login" data-toggle="modal">Sign in / Sign
                                                up</router-link>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- End .top-menu -->
                        </div><!-- End .header-right -->

                    </div><!-- End .container -->
                </div><!-- End .header-top -->

                <div class="header-middle">
                    <div class="container">
                        <div class="header-left">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>

                            <a href="index.html" class="logo">
                                <img src="frontend/assets/images/demos/demo-3/logo.png" alt="Molla Logo" width="105"
                                    height="25">
                            </a>
                        </div><!-- End .header-left -->

                        <div class="header-center">
                            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                <form action="#" method="get">
                                    <div class="header-search-wrapper search-wrapper-wide">
                                        <label for="q" class="sr-only">Search</label>
                                        <button class="btn btn-primary" type="submit"><i
                                                class="icon-search"></i></button>
                                        <input type="search" class="form-control" name="q" id="q"
                                            placeholder="Tìm kiếm sản phẩm ..." required>
                                    </div><!-- End .header-search-wrapper -->
                                </form>
                            </div><!-- End .header-search -->
                        </div>

                        <div class="header-right">
                            <div class="dropdown compare-dropdown">

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">Blue Night
                                                    Dress</a></h4>
                                        </li>
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">White Long
                                                    Skirt</a></h4>
                                        </li>
                                    </ul>
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .compare-dropdown -->

                            <div class="wishlist">
                                <router-link to="/wishlist" title="Wishlist">
                                    <div class="icon">
                                        <i class="icon-heart-o"></i>
                                        <span class="wishlist-count badge">3</span>
                                    </div>
                                    <p>Yêu thích</p>
                                </router-link>
                            </div><!-- End .compare-dropdown -->

                            <div class="dropdown cart-dropdown">
                                <router-link to="/cart" class="dropdown-toggle" role="button" aria-haspopup="true"
                                    aria-expanded="false" data-display="static">
                                    <div class="icon">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="cart-count">2</span>
                                    </div>
                                    <p>Giỏ hàng</p>
                                </router-link>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">Beige knitted elastic runner shoes</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    x $84.00
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="frontend/assets/images/products/cart/product-1.jpg"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close"></i></a>
                                        </div><!-- End .product -->

                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">Blue utility pinafore denim dress</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    x $76.00
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="frontend/assets/images/products/cart/product-2.jpg"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i
                                                    class="icon-close"></i></a>
                                        </div><!-- End .product -->
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">$160.00</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <router-link to="/cart" href="cart.html" class="btn btn-primary">View
                                            Cart</router-link>
                                        <router-link to="/checkout" class="btn btn-outline-primary-2">
                                            <span>Checkout</span><i class="icon-long-arrow-right"></i> </router-link>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .cart-dropdown -->
                        </div><!-- End .header-right -->
                    </div><!-- End .container -->
                </div><!-- End .header-middle -->

                <div class="header-bottom sticky-header">
                    <div class="container">
                        <div class="header-left">
                            <div class="dropdown category-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-display="static"
                                    title="Danh mục sản phẩm">
                                    Danh mục sản phẩm <i class="icon-angle-down"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                            <li class="item-lead"><a href="#">Daily offers</a></li>
                                            <li class="item-lead"><a href="#">Gift Ideas</a></li>
                                            <li><a href="#">Beds</a></li>
                                            <li><a href="#">Lighting</a></li>
                                            <li><a href="#">Sofas & Sleeper sofas</a></li>
                                            <li><a href="#">Storage</a></li>
                                            <li><a href="#">Armchairs & Chaises</a></li>
                                            <li><a href="#">Decoration </a></li>
                                            <li><a href="#">Kitchen Cabinets</a></li>
                                            <li><a href="#">Coffee & Tables</a></li>
                                            <li><a href="#">Outdoor Furniture </a></li>
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .category-dropdown -->
                        </div><!-- End .header-left -->

                        <div class="header-center">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container active">
                                        <router-link to="/">Trang chủ</router-link>
                                    </li>
                                    <li>
                                        <a href="category.html" class="sf-with-ul">Cửa hàng</a>

                                        <div class="megamenu megamenu-md">
                                            <div class="row no-gutters">
                                                <div class="col-md-8">
                                                    <div class="menu-col">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="menu-title">Danh mục</div>
                                                                <ul>
                                                                    <li><router-link to="/store">Shop List</router-link>
                                                                    </li>
                                                                    <li><router-link to="/store">Shop Grid 2
                                                                            Columns</router-link></li>
                                                                    <li><router-link to="/store">Shop Grid 3
                                                                            Columns</router-link></li>
                                                                    <li><router-link to="/store">Shop Grid 4
                                                                            Columns</router-link></li>
                                                                    <li><router-link to="/store"><span>Shop Market<span
                                                                                    class="tip tip-new">New</span></span></router-link>
                                                                    </li>
                                                                </ul>

                                                                <div class="menu-title">Thương hiệu</div>
                                                                <ul>
                                                                    <li><router-link to="/store"><span>Shop Boxed No
                                                                                Sidebar<span
                                                                                    class="tip tip-hot">Hot</span></span></router-link>
                                                                    </li>
                                                                    <li><router-link to="/store">Shop Fullwidth No
                                                                            Sidebar</router-link></li>
                                                                </ul>
                                                            </div><!-- End .col-md-6 -->

                                                            <div class="col-md-6">
                                                                <div class="menu-title">Danh mục khác</div>
                                                                <ul>
                                                                    <li><router-link to="/store">Product Category
                                                                            Boxed</router-link></li>
                                                                    <li><router-link to="/store"><span>Product Category
                                                                                Fullwidth<span
                                                                                    class="tip tip-new">New</span></span></router-link>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- End .col-md-6 -->
                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->

                                                <div class="col-md-4">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html" class="banner banner-menu">
                                                            <img src="frontend/assets/images/menu/banner-1.jpg"
                                                                alt="Banner">

                                                            <div class="banner-content banner-content-top">
                                                                <div class="banner-title text-white">Last
                                                                    <br>Chance<br><span><strong>Sale</strong></span>
                                                                </div><!-- End .banner-title -->
                                                            </div><!-- End .banner-content -->
                                                        </a>
                                                    </div><!-- End .banner banner-overlay -->
                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-md -->
                                    </li>
                                    <li>
                                        <router-link to="/blog">Tin tức</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/about">Về chúng tôi</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/contact">Liên hệ</router-link>
                                    </li>

                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-center -->

                        <div class="header-right">
                            <i class="la la-lightbulb-o"></i>
                            <p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
                        </div>
                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
            </header><!-- End .header -->
        </div><!-- End .page-wrapper -->
    </header>
</template>

<script>
// Import các thư viện hoặc components cần thiết
export default {
    // Định nghĩa các thuộc tính hoặc phương thức của component
}
</script>

<style>
/* CSS cho header */
</style>