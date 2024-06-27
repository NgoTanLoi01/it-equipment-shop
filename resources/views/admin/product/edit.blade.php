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
                                    <h4>SỬA SẢN PHẨM</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Tên sản phẩm</strong></label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Giá sản phẩm</strong></label>
                                            <input name="price" type="text" class="form-control"
                                                placeholder="Nhập giá sản phẩm" value="{{ $product->price }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Chọn phần trăm giảm giá</strong></label>
                                            <select name="sale_percentage" class="form-control">
                                                <option value="">Không giảm giá</option>
                                                @for ($i = 5; $i <= 75; $i += 5)
                                                    <option value="{{ $i }}"
                                                        {{ $product->sale_percentage == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <label><strong>Ảnh đại diện</strong></label>
                                            <input name="feature_image_path" type="file" class="form-control-file">
                                            <div class="col-md-3 feature_image_container">
                                                <div class="row">
                                                    <img class="feature_image" src="{{ $product->feature_image_path }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Ảnh chi tiết</strong></label>
                                            <input name="image_path[]" multiple type="file" class="form-control-file">
                                            <div class="col-md-12 containe_image_detail">
                                                <div class="row">
                                                    @foreach ($product->productImage as $productImageItem)
                                                        <div class="col-md-3">
                                                            <img class="image_detail"
                                                                src="{{ $productImageItem->image_path }}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Danh mục sản phẩm</strong></label><br>
                                            <select class="form-control select2_init" name="category_id">
                                                <option value="">Chọn danh mục</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Thương hiệu sản phẩm</strong></label><br>
                                            <select name="tags[]" class="form-control tags_select_choose"
                                                multiple="multiple">
                                                @foreach ($product->tags as $tagItem)
                                                    <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Mô tả sản phẩm</strong></label>
                                            <textarea name="contents" class="form-control" id="content">{{ $product->content }}</textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Kho</strong></label>
                                            <input name="quantity" type="text" class="form-control"
                                                placeholder="Nhập số lượng sản phẩm nhập" value="{{ $product->quantity }}">
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
@endsection
