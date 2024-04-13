@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/slider/index/index.css') }}">
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

<style>
    /* Add styles to the existing CSS block or create a new one */

    /* Override existing styles for text-wrapper */
    .text-wrapper {
        text-align: center;
        margin-top: 150px;
        /* Adjust as needed */
    }

    /* Style for the title */
    .title {
        font-size: 100px;
        color: #ee4b5e;
        /* Red color */
    }

    /* Style for the subtitle */
    .subtitle {
        font-size: 40px;
        color: #1fa9d6;
        /* Dark gray color */
        margin-bottom: 20px;
    }

    /* Style for the isi (content) */
    .isi {
        font-size: 16px;
        color: #1fa9d6;
        /* Light gray color */
        margin-bottom: 30px;
    }

    /* Style for the buttons */
    .buttons {
        margin-top: 30px;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        color: #fff;
        background-color: #3498db;
        /* Blue color */
        text-decoration: none;
        border-radius: 5px;
    }

    .button:hover {
        background-color: #2980b9;
        /* Darker blue on hover */
    }
</style>

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-wrapper">
                            <div class="title" data-content="403">
                                403 - TRUY CẬP BỊ TỪ CHỐI
                            </div>

                            <div class="subtitle">
                                Rất tiếc, bạn không có quyền truy cập trang này.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
