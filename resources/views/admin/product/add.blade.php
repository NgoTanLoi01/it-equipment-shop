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
                                    <h4>Thêm Sản Phẩm</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Giá sản phẩm</label>
                                            <input name="price" type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                                        </div>
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Giá sản phẩm sau khi giảm</label>
                                            <input name="sale_price" type="text"
                                                class="form-control @error('sale_price') is-invalid @enderror"
                                                placeholder="Nhập giá sản phẩm sau khi giảm"
                                                value="{{ old('sale_price') }}">
                                        </div>
                                        @error('sale_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input name="feature_image_path" type="file" class="form-control-file">
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh chi tiết</label>
                                            <input name="image_path[]" multiple type="file" class="form-control-file">
                                        </div>

                                        <div class="form-group">
                                            <label>Danh mục sản phẩm</label><br>
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

                                        <div class="form-group">
                                            <label>Thêm tags cho sản phẩm</label><br>
                                            <select name="tags[]" class="form-control tags_select_choose"
                                                multiple="multiple">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả sản phẩm</label>
                                            <textarea name="contents" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('contents') }}</textarea>
                                        </div>
                                        @error('contents')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label>Kho</label>
                                            <input name="quantity" type="text" class="form-control"
                                                placeholder="Nhập số lượng sản phẩm nhập" value="{{ old('quantity') }}">
                                        </div>

                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-arrow-up"></i>Gửi</button>
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
    <script src="https://cdn.tiny.cloud/1/jlj6iu2nqcxzcnx68yjsq7ca1jz9ps3y2cae1mahhq1vdup0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
    </script>
@endsection
