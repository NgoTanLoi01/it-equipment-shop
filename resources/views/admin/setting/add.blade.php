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
                                    <h4>Thêm Setting</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('settings.store') . '?type=' . request() ->type }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Config key</label>
                                            <input name="config_key" type="text"
                                                class="form-control form-control @error('config_key') is-invalid @enderror"
                                                placeholder="Nhập config key">
                                            @error('config_key')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
            
                                        @if (request()->type === 'Text')
                                            <div class="form-group">
                                                <label>Config value</label>
                                                <input name="config_value" type="text"
                                                    class="form-control form-control @error('config_value') is-invalid @enderror"
                                                    placeholder="Nhập config value">
                                                @error('config_value')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @elseif(request()->type === 'Textarea')
                                            <div class="form-group">
                                                <label>Config value</label>
                                                <textarea id="content" name="config_value"
                                                    class="form-control form-control @error('config_value') is-invalid @enderror"></textarea>
                                                @error('config_value')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif
            
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-up"></i>Gửi</button>
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
