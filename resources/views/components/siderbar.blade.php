{{-- <div class="header-left">
    <div class="dropdown category-dropdown">
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-display="static" title="Browse Categories">
            Danh mục sản phẩm <i class="icon-angle-down"></i>
        </a>

        <div class="dropdown-menu">
            <nav class="side-nav">
                <ul class="menu-vertical sf-arrows">
                    @foreach ($categorys as $category)
                        <li>
                            <a href="#">{{ $category->name }}</a>
                            <!-- Danh mục con-->
                            <ul class="submenu">
                                @foreach ($category->categoryChildrent as $categoryChildrent)
                                    <li>
                                        <a
                                            href="{{ route('category.product', ['slug' => $categoryChildrent->slug, 'id' => $categoryChildrent->id]) }}">
                                            {{ $categoryChildrent->name }}
                                        </a>
                                    </li>
                                    <!-- Thêm danh mục con khác nếu cần -->
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul><!-- End .menu-vertical -->
            </nav><!-- End .side-nav -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .category-dropdown -->
</div><!-- End .header-left --> --}}
<div class="header-left">
    <div class="dropdown category-dropdown">
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" data-display="static"
            title="Danh mục sản phẩm">
            <strong>Danh mục sản phẩm</strong> <i class="icon-angle-down"></i>
        </a>

        <div class="dropdown-menu">
            <nav class="side-nav">
                <ul class="menu-vertical sf-arrows">
                    <li class="item-lead"><a href="#">Laptop</a></li>
                    <li class="item-lead"><a href="#">Đồng hồ thông minh</a></li>
                    <li><a href="#">Máy ảnh</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                    <li><a href="#">Tai nghe</a></li>
                    <li><a href="#">Loa</a></li>
                    <li><a href="#">Chuột</a></li>
                    <li><a href="#">Bàn phím</a></li>
                </ul><!-- End .menu-vertical -->
            </nav><!-- End .side-nav -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .category-dropdown -->
</div><!-- End .header-left -->
