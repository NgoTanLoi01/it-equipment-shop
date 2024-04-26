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
                                    <h4>Thêm Danh Mục Sản Phẩm</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Nhập tên danh mục">
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn danh mục cha</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">Chọn danh mục cha</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div><br>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-sm btn-primary"><i
                                                        class="fas fa-plus fa-fw fa-xs"></i>Gửi</button>
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
