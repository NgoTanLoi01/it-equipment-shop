<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')

    {{-- Admin Mofi css --}}
    <link rel="icon" href="{{ asset('AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset(' AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/rating.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/vector-map.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('AdminMofi/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome@5.15.4/css/all.min.css">
    {{-- End Admin Mofi css --}}


    @yield('css')
</head>

<body>

    <div class="loader-wrapper">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner-1"></div>
        </div>
    </div>
    <!-- loader ends-->



    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-header row">
            <div class="header-logo-wrapper col-auto">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                            src="{{ asset('AdminMofi/assets/images/logo/logo.png') }}" alt="" /><img
                            class="img-fluid for-dark" src="{{ asset('AdminMofi/assets/images/logo/logo_light.png') }}"
                            alt="" /></a>
                </div>
            </div>
            @include('partials.header')

            <div class="page-body-wrapper">
                @include('partials.siderbar')

                @yield('content')

                @include('partials.footer')
            </div>
        </div>
    </div>

    {{-- AdminMofi Scrpit --}}
    <!-- latest jquery-->
    <script src="{{ asset('AdminMofi/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('AdminMofi/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('AdminMofi/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('AdminMofi/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('AdminMofi/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('AdminMofi/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/morris-chart/raphael.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/morris-chart/morris.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/morris-chart/prettify.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/echart/pie-chart/facePrint.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/echart/pie-chart/testHelper.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/echart/pie-chart/custom-transition-texture.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/chart/echart/data/symbols.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/slick/slick-theme.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
    <!-- calendar js-->
    <script src="{{ asset('AdminMofi/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/datatable/datatables/datatable.custom1.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/vector-map/map-vector.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/dashboard/dashboard_3.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/ecommerce.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('AdminMofi/assets/js/script.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/theme-customizer/customizer.js') }}"></script>
    <!-- Plugin used-->
    {{-- End AdminMofi Scrpit --}}

    <!-- Page specific script -->
    <script type="text/javascript">
        CKEDITOR.replace('content');
    </script>
    @yield('js')
</body>

</html>
