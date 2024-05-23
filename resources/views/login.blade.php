{{-- <!DOCTYPE html>
<html>

<head>
    <title>NgoTanLoi Digital Technologie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
        /* Coded with love by Mutiullah Samim */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #eceff4 !important;
        }

        .user_card {
            height: 500;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #ffffff;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .form_container {
            margin-top: 100px;
        }

        .login_btn {
            width: 100%;
            background: #c0392b !important;
            color: white !important;
        }

        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .login_container {
            padding: 0 2rem;
        }

        .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }

        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
    </style>
</head>
<!--Coded with love by Mutiullah Samim-->

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('UserLTE/assets/images/demos/demo-3/Logo.jpg') }}" class="brand_logo"
                            alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <h4>Đăng nhập tài khoản Quản trị</h4><br>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control input_user" value=""
                                placeholder="Email"required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Ghi nhớ mật khẩu</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/mofi/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 14:09:25 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('AdminMofi/assets/images/favicon.png') }}" type="image/x-icon">
    <title>NgoTanLoi Digital Technologie</title>
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
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('AdminMofi/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/responsive.css') }}">
</head>

<style>
    img {
        border-radius: 50%;
    }
</style>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" width="100px"
                                    src="{{ asset('UserLTE/assets/images/demos/demo-3/Logo.jpg') }}"
                                    alt="looginpage"><br><span style="font-size: 20px"><strong>NGOTANLOI DIGITAL TECHNOLOGIES</strong></span></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST">
                                @csrf
                                <h4 style="text-align: center">Đăng Nhập Vào Tài Khoản Quản Trị</h4>
                                <p style="text-align: center">Nhập Email và mật khẩu của bạn để đăng nhập</p>
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="ngotanloi@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mật khẩu</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required=""
                                            placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Nhớ mật khẩu</label>
                                    </div><a class="link" href="#">Quên mật khẩu?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" name="button"
                                            type="submit">Đăng
                                            nhập</button>
                                    </div>
                                </div>
                                <h6 class="text-muted mt-4 or">Hoặc đăng nhập với</h6>
                                <div class="social mt-4">
                                    <div class="btn-showcase"><a class="btn btn-light"
                                            href="https://www.linkedin.com/login" target="_blank"><i
                                                class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a
                                            class="btn btn-light" href="https://twitter.com/login?lang=en"
                                            target="_blank"><i class="txt-twitter"
                                                data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                                            href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                                                data-feather="facebook"></i>facebook</a></div>
                                </div>
                                {{-- <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create
                    Account</a></p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ asset('AdminMofi/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('AdminMofi/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('AdminMofi/assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('AdminMofi/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ asset('AdminMofi/assets/js/config.js') }}"></script>
        <!-- Plugins JS start-->
        <!-- calendar js-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ asset('AdminMofi/assets/js/script.js') }}"></script>
        <!-- Plugin used-->
    </div>
</body>

<!-- Mirrored from admin.pixelstrap.net/mofi/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 14:09:25 GMT -->

</html>
