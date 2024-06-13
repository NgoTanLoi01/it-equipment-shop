  <style>
      .sidebar-title strong {
          color: #fff;
          /* hoặc có thể sử dụng 'white' */
      }

      .rounded-image {
          width: 40px;
          /* Đảm bảo kích thước của hình ảnh */
          height: 40px;
          border-radius: 50%;
          /* Bo tròn hình ảnh */
          overflow: hidden;
          /* Loại bỏ phần dư thừa khi bo tròn */
      }

      .rounded-image img {
          width: 100%;
          /* Đảm bảo hình ảnh lấp đầy không gian của phần tử cha */
          height: auto;
          /* Đảm bảo tỷ lệ hình ảnh không bị méo */
          display: block;
          /* Đảm bảo hình ảnh căn giữa */
      }


      .logo-and-text {
          display: flex;
          align-items: center;
          color: white;
      }

      .company-name {
          margin-left: 10px;
          /* Khoảng cách giữa logo và dòng chữ */
          font-size: 18px;
          /* Điều chỉnh kích thước của dòng chữ */
      }

      h6 {
          font-size: 11px;
          color: #fff;
      }
  </style>

  <div class="sidebar-wrapper" data-layout="stroke-svg">
      <div>
          <div class="logo-wrapper">
              <div class="logo-and-text">
                  <div class="rounded-image">
                      <img src="{{ asset('AdminMofi/assets/images/logo/Logo_NTL.jpg') }}" width="40px" alt="">
                  </div>
                  <span class="company-name"><strong>Ngo Tan Loi</strong><br>
                      <h6>Digital Technologies</h6>
                  </span>
                  <br>
              </div>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar">
                  <svg class="stroke-icon sidebar-toggle status_toggle middle">
                      <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#toggle-icon') }}"></use>
                  </svg>
                  <svg class="fill-icon sidebar-toggle status_toggle middle">
                      <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-toggle-icon') }}"></use>
                  </svg>
              </div>
          </div>

          <div class="logo-icon-wrapper">
              <a href="#">
                  <div class="rounded-image">
                      <img class="img-fluid" src="{{ asset('AdminMofi/assets/images/logo/Logo_NTL.jpg') }}"
                          width="40px" alt="">
                  </div>
              </a>
          </div>

          <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                  <ul class="sidebar-links" id="simple-bar">
                      <li class="back-btn"><a href="#"><img class="img-fluid"
                                  src="{{ asset('AdminMofi/assets/images/logo/logo-icon.png') }}" alt=""></a>
                          <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                  aria-hidden="true"></i></div>
                      </li>

                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title" href="{{ route('home.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Thống Kê</strong></a>
                      </li>
                      <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('slider.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#header-bookmark') }}">
                                  </use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Slider</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title"
                              href="{{ route('categories.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#product-category') }}">
                                  </use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Danh Mục Sản Phẩm</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title"
                              href="{{ route('product.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#product-detail') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Sản Phẩm</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav"
                              href="{{ route('settings.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#setting') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Setting</strong></a>
                      </li>
                      <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                              href="{{ URL::to('/manage-order') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#orders') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Đơn Hàng</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav"
                              href="{{ route('customers.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#customers') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Danh Sách Khách Hàng</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title"
                              href="{{ route('users.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#stroke-user') }}">
                                  </use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Danh Sách Thành Viên</strong></a>
                      </li>
                      <li class="sidebar-list"> <a class="sidebar-link sidebar-title"
                              href="{{ route('roles.index') }}">
                              <svg class="stroke-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                              </svg>
                              <svg class="fill-icon">
                                  <use href="{{ asset('AdminMofi/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                              </svg><strong>Danh Sách Vai Trò</strong></a>
                      </li>
              </div>
          </nav>
      </div>
  </div>
