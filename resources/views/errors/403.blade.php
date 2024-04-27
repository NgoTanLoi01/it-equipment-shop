@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection
@section('content')
    <div class="page-body" >
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- error-403 start-->
            <div class="error-wrapper">
                <div class="container"><img class="img-100"
                        src="{{ asset('AdminMofi/assets/images/other-images/sad2.gif') }}" alt="">
                    <div class="error-heading">
                        <h2 class="headline font-success" style="font-size: 200px">403</h2>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <h1 class="sub-content"><strong>Rất Tiếc Bạn Không Có Quyền Truy Cập Vào Trang Này</strong></h1>
                    </div>
                    <div><a class="btn btn-success-gradien btn-lg" href="{{ route('home.index') }}">TRỞ VỀ TRANG CHỦ</a></div>
                </div>
            </div>
            <!-- error-403 end-->
        </div>
    </div>
@endsection
