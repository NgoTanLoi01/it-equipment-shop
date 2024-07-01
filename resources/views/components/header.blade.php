<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i
                        class="icon-phone"></i>{{ getConfigValueFromSettingTable('Phone_contact') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="header-left">
                <a href="tel:#"><i class="icon-envelope"></i>{{ getConfigValueFromSettingTable('Email') }}</a>
            </div>
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <ul>
                            <?php
                            use App\Models\Customer;
                            $customer_id = Session::get('customer_id');
                            $google_id = Session::get('google_id');
                            
                            if ($customer_id != NULL) {
                                $user = Customer::where('customer_id', $customer_id)->first();
                            } elseif ($google_id != NULL) {
                                $user = Customer::where('google_id', $google_id)->first();
                            }
                            
                            if (isset($user)) {
                                $customer_name = $user->customer_name;
                            ?>
                            <li><a href="#">{{ $customer_name }}</a></li>
                            <li><a href="{{ URL::to('/logout-checkout') }}">Đăng xuất</a></li>
                            <?php
                            } else {
                            ?>
                            <li><a href="{{ URL::to('/login-checkout') }}">Đăng nhập / Đăng ký</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="" class="logo" style="text-align: center; display: block;">
                    <img src="{{ asset('UserLTE/assets/images/demos/demo-3/Logo.jpg') }}" alt="Molla Logo"
                        width="50" height="10 " style="border-radius: 50%; margin: 0 auto;">
                    <p style="margin: 0;">NGO TAN LOI</p>
                    <p>Digital Technologies</p>
                </a>

            </div>

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ URL::to('/tim_kiem') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" name="search_items" type="submit"><i
                                    class="icon-search"></i></button>
                            <input type="search" class="form-control" name="keywords_submit" id="q"
                                placeholder="Tìm kiếm sản phẩm ..." required>
                            <div id="suggestions" class="suggestions"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-right">
                <div class="wishlist">
                    <a href="{{ URL::to('/customer-account') }}" title="My account">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>Tài khoản</p>
                    </a>
                </div>
                <div class="wishlist">
                    <a href="{{ URL::to('/yeu_thich') }}">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                        </div>
                        <p>Yêu thích</p>
                    </a>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="{{ URL::to('/show-cart') }}" class="dropdown-toggle" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $cart->count() }}</span>
                        </div>
                        <p>Giỏ hàng</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header">
        <div class="container">
            @include('components/siderbar')

            @include('components/main_menu')

            <div class="header-right">
                <i class="la la-lightbulb-o"></i>
                <p>Khai trương<span class="highlight">&nbsp;<span style="color: red; font-size: 20px">SỐC</span> không
                        giảm giá!</span></p>
            </div>
        </div>
    </div>
</header>
<script>
    $(document).ready(function() {
        $('#q').on('keyup', function() {
            var query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: "{{ route('tim_kiem.suggestions') }}",
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        $('#suggestions').html(data).show();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            } else {
                $('#suggestions').hide();
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-search-wrapper').length) {
                $('#suggestions').hide();
            }
        });
    });
</script>

<style>
    .suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #fff;
        max-height: auto;
        /* overflow-x: hidden; */
        z-index: 1000;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.3);
        color: #000;
        border-radius: 8px;
        padding: 0 10px;
    }

    .suggest_search {
        margin: 0;
        padding: 0;
    }

    .suggest_item {
        padding: 4px;
        border-bottom: 1px solid #ddd;
        color: inherit;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .suggest_item:last-child {
        border-bottom: none;
    }

    .suggest_item a {
        color: inherit;
        text-decoration: none;
        margin-left: 10px;
        flex: 1;
        white-space: nowrap;
        /* overflow: hidden; */
        text-overflow: ellipsis;
    }

    .suggest_item .product-image {
        max-width: 50px;
        max-height: 50px;
        object-fit: cover;
        margin-right: 10px;
        border-radius: 5px;
    }

    .suggest_item:hover {
        background-color: #f1f1f1;
    }

    .suggest_item.titlee {
        background: #f5f5f5;
        font-size: 14px;
        color: #666;
        font-weight: 600;
        padding: 10px;
        margin: 0 -10px 10px -10px;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }
</style>
