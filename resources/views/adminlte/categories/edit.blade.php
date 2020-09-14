@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('admin.categories.create title') }}
                    </h5>
                </div>
                <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">                                        
                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.categories.form.name_ar')  }}</label>
                            <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="" value="{{ $category->name_ar }}">
                            @error('name_ar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.categories.form.name_en')  }}</label>
                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="" value="{{ $category->name_en }}">
                            @error('name_en')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Parent Category</label>
                            <div id="jstree"></div>
                            <input type="hidden" name="parent_id" value="" id="parent_id">
                            @error('parent_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="makeMain" name="makeMain">
                            <label class="form-check-label" for="defaultCheck1">Make Main Category</label>
                        </div>

                        <div class="form-group">
                            <label for="description_ar">{{ __('admin.categories.form.description_ar')  }}</label>
                            <textarea class="form-control" name="description_ar" id="description_ar" rows="3">{{ $category->description_ar }}</textarea>
                            @error('description_ar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{ __('admin.categories.form.description_en')  }}</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="3">{{ $category->description_en }}</textarea>
                            @error('description_en')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keywords">{{ __('admin.categories.form.keywords')  }}</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="3">{{ $category->keywords }}</textarea>
                            @error('keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">{{ __('admin.categories.form.icon')  }}</label>
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="" value="{{ $category->icon }}">
                            @error('icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('admin.categories.form.image')  }}</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ Storage::url($category->image) }}" alt="" style="max-width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
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

@push('vScripts')
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
</script>
@endpush

