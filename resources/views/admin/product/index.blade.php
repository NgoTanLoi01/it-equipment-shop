@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminMofi/assets/css/vendors/js-datatables/style.css') }}">
    {{-- Hiển thị sản phẩm xen kẽ nhau --}}
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/view.css') }}">
@endsection
@section('js')
    <script src="{{ asset('AdminMofi/assets/js/js-datatables/simple-datatables%40latest.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/custom-list-product.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('AdminMofi/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
    {{-- Tìm kiếm sản phẩm --}}
    <script src="{{ asset('AdminMofi/assets/js/search.js') }}"></script>
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h4>DANH SÁCH SẢN PHẨM</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-product-header">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('product.create') }}"><img
                                            src="{{ asset('AdminMofi/assets/images/icon/add.png') }}" width="16px"
                                            alt=""><strong>Thêm Sản
                                            Phẩm</strong></a>
                                </div>
                                <div class="collapse" id="collapseProduct">
                                </div>
                            </div>
                            <div class="list-product">
                                <div
                                    class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                    <div class="datatable-top">
                                        <div class="datatable">
                                            <label>
                                                <select class="datatable-selector">
                                                    <option value="5" selected="">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                </select> trên mỗi trang
                                            </label>
                                        </div>
                                        <div class="datatable-search">
                                            <input class="datatable-input" id="searchInput" placeholder="Search..."
                                                type="search" title="Search within table" aria-controls="project-status">
                                        </div>
                                    </div>
                                    <div class="datatable-container">
                                        <table class="table datatable-table" id="project-status">
                                            <thead>
                                                <th scope="col"><strong>STT</strong></th>
                                                <th scope="col"><strong>Tên Sản Phẩm</strong></th>
                                                <th scope="col"><strong>Giá Gốc</strong></th>
                                                <th scope="col"><strong>Giảm Giá (%)</strong></th>
                                                <th scope="col"><strong>Giá Sau Giảm</strong></th>
                                                <th scope="col"><strong>Hình Ảnh</strong></th>
                                                <th scope="col"><strong>Danh Mục</strong></th>
                                                <th scope="col"><strong>Kho</strong></th>
                                                <th scope="col"><strong>Hành Động</strong></th>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $productItem)
                                                    <tr>
                                                        <td>{{ $productItem->id }}</td>
                                                        <td>{{ $productItem->name }}</td>
                                                        <td>{{ number_format(floatval($productItem->price)) }} VNĐ</td>
                                                        <td style="text-align: center"><strong>{{ $productItem->sale_percentage }}</strong></td>
                                                        <td style="color: red">
                                                            {{ number_format(floatval($productItem->sale_price)) }} VNĐ
                                                        </td>
                                                        <td>
                                                            <img class="product_image_150_100"
                                                                src="{{ $productItem->feature_image_path }}"
                                                                alt="">
                                                        </td>
                                                        
                                                        <td>{{ optional($productItem->category)->name }}</td>
                                                        <td>{{ $productItem->quantity }}</td>
                                                        <td>
                                                            <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                                                class="btn btn-sm btn-warning"><img
                                                                    src="{{ asset('AdminMofi/assets/images/icon/edit.png') }}"
                                                                    width="16px" alt=""><strong>Sửa</strong></a>
                                                            <br><br>
                                                            <a href="" class="btn btn-sm btn-danger action_delete"
                                                                data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"><img
                                                                    src="{{ asset('AdminMofi/assets/images/icon/delete.png') }}"
                                                                    width="16px" alt=""><strong>Xóa</strong></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datatable-bottom">
                                        <nav class="datatable-pagination">
                                            <ul class="datatable-pagination-list">
                                                <li>
                                                    {{ $products->links('pagination::bootstrap-4') }}
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
