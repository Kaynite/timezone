@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <!-- TODO: Set Icons Margin -->
                        <li class="px-2">
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="title-tab-tab" data-toggle="pill" href="#title-tab" role="tab" aria-controls="title-tab" aria-selected="true">
                                <i class="fas fa-align-center mr-2"></i>Product Title
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-category-tab" data-toggle="pill" href="#product-category" role="tab" aria-controls="product-category" aria-selected="false">
                                <i class="fas fa-list mr-2"></i>Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">
                                <i class="fas fa-info mr-2"></i>Product Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-media-tab" data-toggle="pill" href="#product-media" role="tab" aria-controls="product-media" aria-selected="false">
                                <i class="fas fa-image mr-2"></i>Media
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="shipping-info-tab" data-toggle="pill" href="#shipping-info" role="tab" aria-controls="shipping-info" aria-selected="false">
                                <i class="fas fa-truck mr-2"></i>Shipping Info.
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="more-info-tab" data-toggle="pill" href="#more-info" role="tab" aria-controls="more-info" aria-selected="false">
                                <i class="fas fa-truck mr-2"></i>More Info.
                            </a>
                        </li>
                    </ul>
                </div>
                
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" id="product-form">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            @include('adminlte.products.tabs.title')
                            @include('adminlte.products.tabs.category')
                            @include('adminlte.products.tabs.info')
                            @include('adminlte.products.tabs.media')
                            @include('adminlte.products.tabs.shipping')
                            @include('adminlte.products.tabs.more')
                        </div>
                    </div>
                </form>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('product-form').submit();"><i class="fa fa-save mr-2"></i>Save</button>
                    <button type="button" class="btn btn-info" id="save-continue"><i class="fa fa-save mr-2"></i>Save & Continue</button>
                    {{-- Copy Form --}}
                    <form action="{{ route('products.copy', $product->id) }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-primary" type="submit"><i class="fa fa-copy mr-2"></i>Copy</button>
                    </form>
                    {{-- Delete Form --}}
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-2"></i>Delete</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('title')
{{ __('admin.products.edit title') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/jstree/dist/themes/default/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/select2/select2bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/toastr/toastr.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/jstree/dist/jstree.min.js') }}"></script>
    <script src="{{ asset('adminlte/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('adminlte/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $('#jstree').on('changed.jstree', function (e, data) {
            var i, j, r = [];
            for (i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('#category_id').val(r[0]);
        }).jstree({
            'core': {
                'data': {!! $treeJson !!},
                "themes": {
                    "variant": "large"
                }
            },
            "checkbox": {
                "keep_selected_style": false
            },
            "plugins": ["wholerow"]
        });

        $("#myDropzone").dropzone({
            url: '{{ route('products.store') }}',
            uploadMultiple: false,
            paramName: 'images',
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            params: {
                _token: '{{ csrf_token() }}'
            },
        });

        $(document).ready(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        var savec = document.getElementById('save-continue');
        
        savec.addEventListener('click', function() {
            var formData = new FormData(document.getElementById('product-form'));
            $.ajax({
                url: "{{ route('products.update', $product->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data){
                    if(data.status == 'success') {
                        toastr.success(data.message);
                        
                        for(var pair of formData.entries()) {
                            $('#' + pair[0]).removeClass('is-invalid');
                            $('#' + pair[0] + '_help').text('');
                        }
                    }
                },
                error: function (error) {
                    toastr.error(error.responseJSON.message);
                    $.each(error.responseJSON.errors, function(index, value) {
                        $('#' + index).addClass('is-invalid');
                        $('#' + index + '_help').text(value);
                    });
                }
            });
        });


        $(function () {
            bsCustomFileInput.init();
        });

        $('.make-slug').on('click', function() {
            var lang = $(this).val();
            var title = $(`#title_${lang}`).val();
            if (title == "") {
                $('#slug').addClass('is-invalid');
                $('#slug-error').text('The Product title field is empty')
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{ route('products.makeslug') }}",
                    data: {
                        slug: 'slug',
                        title: title,
                        lang: lang
                    },
                    cache: false,
                    context: this,
                    success: function(data){
                        if(data.status == 'success') {
                            $('#slug').val(data.slug)
                            $('#slug').removeClass('is-invalid');
                            $('#slug').addClass('is-valid');
                            $('#slug-error').text('')
                        } else {
                            $('#slug').addClass('is-invalid');
                            $('#slug-error').text(data.message)
                        }
                    },
                    error: function (error) {
                        toastr.error(error.responseJSON.message);
                    }
                });
            }
        });

    </script>

@endsection