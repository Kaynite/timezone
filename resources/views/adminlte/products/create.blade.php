@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <!-- TODO: Set Icons Margin -->
                        <li class="pt-2 px-3">
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="title-tab-tab" data-toggle="pill" href="#title-tab" role="tab" aria-controls="title-tab" aria-selected="true">
                                <i class="fas fa-align-center mr-2"></i>{{ __('admin.products.tabs title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-category-tab" data-toggle="pill" href="#product-category" role="tab" aria-controls="product-category" aria-selected="false">
                                <i class="fas fa-list mr-2"></i>{{ __('admin.products.tabs category') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">
                                <i class="fas fa-info mr-2"></i>{{ __('admin.products.tabs info') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-media-tab" data-toggle="pill" href="#product-media" role="tab" aria-controls="product-media" aria-selected="false">
                                <i class="fas fa-image mr-2"></i>{{ __('admin.products.tabs media') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="shipping-info-tab" data-toggle="pill" href="#shipping-info" role="tab" aria-controls="shipping-info" aria-selected="false">
                                <i class="fas fa-truck mr-2"></i>{{ __('admin.products.tabs shipping') }}
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="more-info-tab" data-toggle="pill" href="#more-info" role="tab" aria-controls="more-info" aria-selected="false">
                                <i class="fas fa-file-alt mr-2"></i>{{ __('admin.products.tabs more') }}
                            </a>
                        </li>
                    </ul>
                </div>
                
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id="product-form">
                    @csrf
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
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('title')
{{ __('admin.products.create title') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/jstree/dist/themes/default/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/select2/select2bs4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/jstree/dist/jstree.min.js') }}"></script>
    <script src="{{ asset('adminlte/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('adminlte/select2/select2.full.min.js') }}"></script>
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

        $(document).ready(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
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