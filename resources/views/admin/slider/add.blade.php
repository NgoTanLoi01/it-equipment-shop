@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/slider/add/add.css') }}">
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="table-responsive theme-scrollbar">
                    <div id="basic-6_wrapper" class="dataTables_wrapper">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header card-no-border pb-0">
                                    <h4>THÊM SLIDER</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Tên slider</strong></label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập tên slider" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Mô tả slider</strong></label>
                                            <textarea name="description" id="content" class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                        </div>

                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Hình ảnh</strong></label>
                                            <input name="image_path" type="file"
                                                class="form-control @error('image_path') is-invalid @enderror">
                                            @error('image_path')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"><img
                                            src="{{ asset('AdminMofi/assets/images/icon/success.png') }}" width="16px" alt=""><strong> Gửi</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    {{-- <script src="{{ asset('tinymce/tiny.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

@endsection
