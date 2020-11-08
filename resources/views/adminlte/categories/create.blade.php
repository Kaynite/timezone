@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('admin.categories.create title') }}
                    </h5>
                </div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">                                        
                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.categories.form.name_ar')  }}</label>
                            <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="{{ __('admin.categories.form.name_ar placeholder') }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.categories.form.name_en')  }}</label>
                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="{{ __('admin.categories.form.name_en placeholder') }}" value="{{ old('name_en') }}">
                            @error('name_en')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">{{ __('admin.categories.form.slug')  }}</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="{{ __('admin.categories.form.slug placeholder') }}" value="{{ old('slug') }}">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($treeJson != "[]")
                        <div class="form-group">
                            <label for="">{{ __('admin.categories.form.parent category') }}</label>
                            <div id="jstree"></div>
                            <input type="hidden" name="parent_id" value="" id="parent_id">
                            @error('parent_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="description_ar">{{ __('admin.categories.form.description_ar')  }}</label>
                            <textarea class="form-control" name="description_ar" id="description_ar" rows="3" placeholder="{{ __('admin.categories.form.description_ar placeholder') }}">{{ old('description_ar') }}</textarea>
                            @error('description_ar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{ __('admin.categories.form.description_en')  }}</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="3" placeholder="{{ __('admin.categories.form.description_en placeholder') }}">{{ old('description_en') }}</textarea>
                            @error('description_en')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keywords">{{ __('admin.categories.form.keywords')  }}</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="3" placeholder="{{ __('admin.categories.form.keywords placeholder') }}">{{ old('keywords') }}</textarea>
                            @error('keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">{{ __('admin.categories.form.icon')  }}</label>
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="{{ __('admin.categories.form.icon placeholder') }}" value="{{ old('icon') }}">
                            @error('icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('admin.categories.form.image')  }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" value="hh">
                                <label class="custom-file-label" for="site-logo">{{ __('common.choose file') }}</label>
                            </div>
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">{{ __('common.submit') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('title')
{{ __('admin.categories.create title') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/jstree/dist/themes/default/style.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('adminlte/js/custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

<script src="{{ asset('adminlte/jstree/dist/jstree.min.js') }}"></script>

<script>
    $('#jstree').on('changed.jstree', function (e, data) {
        var i, j, r = [];
        for (i = 0, j = data.selected.length; i < j; i++) {
            r.push(data.instance.get_node(data.selected[i]).id);
        }
        $('#parent_id').val(r[0]);
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

    $('#slug').on('focus', function() {
        var title = $('#name_en').val();
        if (title == "") {
            $('#slug').addClass('is-invalid');
            $('#slug-error').text('The Product title in English field is empty')
        } else {
            $.ajax({
                type: "GET",
                url: "{{ route('categories.makeslug') }}",
                data: {
                    slug: 'slug',
                    title: title,
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

