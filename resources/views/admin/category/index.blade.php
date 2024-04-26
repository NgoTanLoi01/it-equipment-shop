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
                                    <h4>Danh Mục Sản Phẩm</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-plus fa-fw fa-xs"></i>Thêm</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive theme-scrollbar">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Thứ tự</th>
                                                        <th scope="col">Tên danh mục</th>
                                                        <th scope="col">Hoạt động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <th scope="row">{{ $category->id }}</th>
                                                            <td>{{ $category->name }}</td>
                                                            <td>
                                                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                                    class="btn btn-sm btn-warning"><i
                                                                        class="fas fa-edit"></i>Sửa</a>
                                                                <a href="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                                    class="btn btn-sm btn-danger"><i
                                                                        class="fas fa-trash"></i>Xóa</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-10 text-right">
                                        {{ $categories->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
