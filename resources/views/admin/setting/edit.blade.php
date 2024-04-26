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
                                    <h4>Sửa Setting</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Config key</label>
                                            <input name="config_key" type="text"
                                                class="form-control form-control @error('config_key') is-invalid @enderror"
                                                placeholder="Nhập config key" value="{{ $setting->config_key }}">

                                            @error('config_key')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        @if (request()->type === 'Text')
                                            <div class="form-group">
                                                <label>Config value</label>
                                                <input name="config_value" type="text"
                                                    class="form-control form-control @error('config_value') is-invalid @enderror"
                                                    placeholder="Nhập config value" value="{{ $setting->config_value }}">
                                                @error('config_value')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @elseif(request()->type === 'Textarea')
                                            <div class="form-group">
                                                <label>Config value</label>
                                                <textarea id="content" name="config_value"
                                                    class="form-control form-control @error('config_value') is-invalid @enderror">{{ $setting->config_value }}</textarea>
                                                @error('config_value')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif

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
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>
@endsection
