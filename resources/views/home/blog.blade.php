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
                <h1 class="page-title"><strong>Tin Tức</strong></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center"> <!-- Sử dụng lớp justify-content-center để căn giữa -->
                        <li class="breadcrumb-item"><a href="#"><strong>Trang Chủ</strong></a></li>
                        <li class="breadcrumb-item"><a href="#"><strong>Tin Tức</strong></a></li>
                    </ol>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <div class="page-content">
            <div class="container">
                <div class="entry-container max-col-3" data-layout="fitRows" style="position: relative; height: 1518.3px;">
                    <div class="entry-item lifestyle shopping col-sm-6 col-lg-4"
                        style="position: absolute; left: 0px; top: 0px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-1.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 22, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">2 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Cras ornare tristique elit.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Lifestyle</a>,
                                    <a href="#">Shopping</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas vulputate ...</p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item lifestyle col-sm-6 col-lg-4" style="position: absolute; left: 396px; top: 0px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media entry-video">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-2.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 21, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">0 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Vivamus vestibulum ntulla necante.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Lifestyle</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulumvolutpat,
                                        lacus a ultrices sagittis, mi neque euismod dui ...</p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item lifestyle fashion col-sm-6 col-lg-4"
                        style="position: absolute; left: 792px; top: 0px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <div class="owl-carousel owl-simple owl-light owl-nav-inside owl-loaded owl-drag"
                                    data-toggle="owl">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-752px, 0px, 0px); transition: all 0s ease 0s; width: 2256px;">
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-3.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-4.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item active" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-3.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-4.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-3.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-4.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                        </div>
                                    </div>
                                </div><!-- End .owl-carousel -->
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 18, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">3 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Utaliquam sollicitudin leo.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Fashion</a>,
                                    <a href="#">Lifestyle</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item travel col-sm-6 col-lg-4" style="position: absolute; left: 0px; top: 506.1px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-4.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">Jane Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 15, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">4 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Fusce pellentesque suscipit.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Travel</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu
                                        vulputate magna eros eu erat. Aliquam erat volutpat ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item travel hobbies col-sm-6 col-lg-4"
                        style="position: absolute; left: 396px; top: 506.1px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-5.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 11, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">2 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Aenean dignissim pellente squefelis.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Travel</a>,
                                    <a href="#">Hobbies</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis
                                        luctus, metus. Phasellus ultrices nulla quis nibh. Quisque lectus ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item hobbies col-sm-6 col-lg-4"
                        style="position: absolute; left: 792px; top: 506.1px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-6.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 10, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">4 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Quisque volutpat mattiseros.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Hobbies</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
                                        Phasellus ultrices nulla quis nibh. Quisque lectus. Donec consectetuer ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item travel col-sm-6 col-lg-4"
                        style="position: absolute; left: 0px; top: 1012.2px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <div class="owl-carousel owl-simple owl-light owl-nav-inside owl-loaded owl-drag"
                                    data-toggle="owl">


                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-752px, 0px, 0px); transition: all 0s ease 0s; width: 2256px;">
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-7.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-6.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item active" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-7.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-6.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-7.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                            <div class="owl-item cloned" style="width: 376px;"><a href="single.html">
                                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-6.jpg') }}"
                                                        alt="image desc">
                                                </a></div>
                                        </div>
                                    </div>
                                </div><!-- End .owl-carousel -->
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 11, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">3 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Utaliquam sollicitudin leo.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Travel</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu
                                        vulputate magna eros eu erat. Aliquam erat volutpat ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item fashion col-sm-6 col-lg-4"
                        style="position: absolute; left: 396px; top: 1012.2px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-8.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 08, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">0 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Quisque a lectus. </a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Fashion</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis
                                        luctus, metus. Phasellus ultrices nulla quis nibh. Quisque lectus ... </p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    <div class="entry-item travel col-sm-6 col-lg-4"
                        style="position: absolute; left: 792px; top: 1012.2px;">
                        <article class="entry entry-grid text-center">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{ asset('UserLTE/assets/images/blog/grid/3cols/post-9.jpg') }}"
                                        alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#">John Doe</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#">Nov 07, 2018</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">5 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="single.html">Fusce lacinia arcu etnulla.</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">Travel</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
                                        Phasellus ultrices nulla quis nibh. Quisque lectus. Donec consectetuer ...</p>
                                    <a href="single.html" class="read-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->
                </div><!-- End .entry-container -->

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
@endsection
