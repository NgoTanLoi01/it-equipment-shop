@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/about-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title"><strong>Về Chúng Tôi</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Về Chúng Tôi</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <br>
        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <h2 class="title">Our Vision</h2><!-- End .title -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque
                            aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed
                            pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc
                            tortor eu nibh. </p>
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <h2 class="title">Our Mission</h2><!-- End .title -->
                        <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu
                            augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus.
                            <br>Praesent elementum hendrerit tortor. Sed semper lorem at felis.
                        </p>
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="mb-5"></div><!-- End .mb-4 -->
            </div><!-- End .container -->

            <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-3 mb-lg-0">
                            <h2 class="title">Who We Are</h2><!-- End .title -->
                            <p class="lead text-primary mb-3">Pellentesque odio nisi, euismod pharetra a ultricies
                                <br>in diam. Sed arcu. Cras consequat
                            </p><!-- End .lead text-primary -->
                            <p class="mb-2">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo,
                                eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate
                                volutpat, uctus metus libero eu augue. </p>

                            <a href="blog.html" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                                <span>VIEW OUR NEWS</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-5 -->

                        <div class="col-lg-6 offset-lg-1">
                            <div class="about-images">
                                <img src="{{ asset('UserLTE/assets/images/about/img-1.jpg') }}" alt=""
                                    class="about-img-front">
                                <img src="{{ asset('UserLTE/assets/images/about/img-2.jpg') }}" alt=""
                                    class="about-img-back">
                            </div><!-- End .about-images -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-6 pb-6 -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="brands-text">
                            <h2 class="title">The world's premium design brands in one destination.</h2>
                            <!-- End .title -->
                            <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel,
                                dapibus id, mattis vel, nis</p>
                        </div><!-- End .brands-text -->
                    </div><!-- End .col-lg-5 -->
                    <div class="col-lg-7">
                        <div class="brands-display">
                            <div class="row justify-content-center">
                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/1.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/2.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/3.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/4.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/5.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/6.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/7.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/8.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4">
                                    <a href="#" class="brand">
                                        <img src="{{ asset('UserLTE/assets/images/brands/9.png') }}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .brands-display -->
                    </div><!-- End .col-lg-7 -->
                </div><!-- End .row -->

                <hr class="mt-4 mb-6">

            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

            <div class="about-testimonials bg-light-2 pt-6 pb-6">
                <div class="container">
                    <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple owl-testimonials-photo owl-loaded owl-drag" data-toggle="owl"
                        data-owl-options="{
                            &quot;nav&quot;: false, 
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 20,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;1200&quot;: {
                                    &quot;nav&quot;: true
                                }
                            }
                        }">
                        <!-- End .testimonial -->

                        <!-- End .testimonial -->
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1188px, 0px, 0px); transition: all 0.4s ease 0s; width: 2376px;">
                                <div class="owl-item" style="width: 1168px; margin-right: 20px;">
                                    <blockquote class="testimonial text-center">
                                        <img src="{{ asset('UserLTE/assets/images/testimonials/user-1.jpg') }}"
                                            alt="user">
                                        <p>“ Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque
                                            aliquet nibh nec urna. <br>In nisi neque, aliquet vel, dapibus id, mattis
                                            vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                            sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                                            Suspendisse potenti. ”</p>
                                        <cite>
                                            Jenson Gregory
                                            <span>Customer</span>
                                        </cite>
                                    </blockquote>
                                </div>
                                <div class="owl-item active" style="width: 1168px; margin-right: 20px;">
                                    <blockquote class="testimonial text-center">
                                        <img src="{{ asset('UserLTE/assets/images/testimonials/user-2.jpg') }}"
                                            alt="user">
                                        <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio
                                            eius error libero perferendis nesciunt atque dolores magni recusandae!
                                            Doloremque quidem error eum quis similique doloribus natus qui ut
                                            ipsum.Velit quos ipsa exercitationem, vel unde obcaecati impedit eveniet
                                            non. ”</p>

                                        <cite>
                                            Victoria Ventura
                                            <span>Customer</span>
                                        </cite>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .testimonials-slider owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-5 pb-6 -->
        </div><!-- End .page-content -->
    </main>
@endsection
