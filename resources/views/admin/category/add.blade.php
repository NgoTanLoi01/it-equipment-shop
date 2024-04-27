@extends('layouts.admin')

@section('title')
    <title>NGO TAN LOI Digital Technologies</title>
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
                                    <h4>THÊM DANH MỤC SẢN PHẨM</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Tên danh mục</strong></label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Nhập tên danh mục">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><strong>Chọn danh mục cha</strong></label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">Chọn danh mục cha</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div><br>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-sm btn-primary"><img
                                                    src="{{ asset('AdminMofi/assets/images/icon/success.png') }}" width="16px" alt=""><strong> Gửi</strong></button>
                                            </div>
                                        </div>
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
