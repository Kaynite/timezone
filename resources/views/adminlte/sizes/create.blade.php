@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.sizes.create title') }}
                </div>
                <form action="{{ route('sizes.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.sizes.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.sizes.form.name_ar placeholder') }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.sizes.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.sizes.form.name_en placeholder') }}" value="{{ old('name_en') }}">
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($treeJson != "[]")
                        <div class="form-group">
                            <label>{{ __('admin.sizes.form.category_id') }}</label>
                            <div id="jstree"></div>
                            <input type="hidden" name="category_id" value="" id="category_id">
                            @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="public">{{ __('admin.sizes.form.status') }}</label>
                            <select class="form-control" name="public" id="public">
                                <option value="1">{{ __('common.public') }}</option>
                                <option value="0">{{ __('common.private') }}</option>
                            </select>
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
{{ __('admin.sizes.create title') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/jstree/dist/themes/default/style.min.css') }}">
@endsection

@section('scripts')

<script src="{{ asset('adminlte/jstree/dist/jstree.min.js') }}"></script>

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
</script>
@endsection