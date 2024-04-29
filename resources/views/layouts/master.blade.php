<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:8000');
header('Access-Control-Allow-Headers: *');
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset(' AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    {{-- @yield('title') --}}
    <title>NTL Digital Technologies</title>
    <meta name="keywords" content="HTML5">
    <meta name="description" content="">
    <meta name="author" content="p-themes">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/skins/skin-demo-3.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/demos/demo-3.css') }}">
    <link rel="stylesheet" href="{{ asset('UserLTE/assets/css/plugins/nouislider/nouislider.css') }}">
    @yield('css')

    <!-- Plugins JS File -->
    <script src="{{ asset('UserLTE/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/jquery.elevateZoom.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('UserLTE/assets/js/main.js') }}"></script>
    <script src="{{ asset('UserLTE/assets/js/demos/demo-3.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-3.js"></script>

    <!-- Your SDK code -->
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        if (chatbox) {
            chatbox.setAttribute("page_id", "102446055464729");
            chatbox.setAttribute("attribution", "biz_inbox");
        }
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    @yield('js')
</head>

<body>
    <div class="page-wrapper">
        @include('components.header')

        @yield('content')

        @include('components.footer')
    </div>
</body>

</html>
