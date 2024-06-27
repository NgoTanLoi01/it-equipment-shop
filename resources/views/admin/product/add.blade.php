@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminPublic/product/add/add.css') }}" rel="stylesheet" />
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
                                    <h4>THÊM SẢN PHẨM</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Tên sản phẩm</strong></label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Giá sản phẩm</strong></label>
                                            <input name="price" type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                                        </div>
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Chọn phần trăm giảm giá</strong></label>
                                            <select name="sale_percentage"
                                                class="form-control @error('sale_percentage') is-invalid @enderror">
                                                <option value="">Không giảm giá</option>
                                                @for ($i = 5; $i <= 75; $i += 5)
                                                    <option value="{{ $i }}"
                                                        {{ old('sale_percentage') == $i ? 'selected' : '' }}>
                                                        {{ $i }}%</option>
                                                @endfor
                                            </select>
                                        </div>
                                        @error('sale_percentage')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Ảnh đại diện</strong></label>
                                            <input name="feature_image_path" type="file" class="form-control-file">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Ảnh chi tiết</strong></label>
                                            <input name="image_path[]" multiple type="file" class="form-control-file">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Danh mục sản phẩm</strong></label><br>
                                            <select
                                                class="form-control select2_init @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                                <option value="">Chọn danh mục</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Thêm thương hiệu sản phẩm</strong></label><br>
                                            <select name="tags[]" class="form-control tags_select_choose"
                                                multiple="multiple">
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Mô tả sản phẩm</strong></label>
                                            <textarea name="contents" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('contents') }}</textarea>
                                        </div>
                                        @error('contents')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Kho</strong></label>
                                            <input name="quantity" type="text" class="form-control"
                                                placeholder="Nhập số lượng sản phẩm kho" value="{{ old('quantity') }}">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"><img
                                                src="{{ asset('AdminMofi/assets/images/icon/success.png') }}"
                                                width="16px" alt=""><strong>Gửi</strong></button>
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
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    </script>
@endsection
