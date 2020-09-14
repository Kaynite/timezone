@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('admin.categories.index title') }}</h5>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        {{ __('admin.categories.create title') }}
                    </a>

                    <a href="" class="btn btn-success disabled" id="edit-btn">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        {{ __('admin.categories.edit title') }}
                    </a>

                    <button type="button" class="btn btn-danger" disabled data-target="#deleteCategory" data-toggle="modal" id="delete-btn">
                        <i class="fa fa-trash" aria-hidden="true"></i> {{ __('admin.categories.delete') }}
                    </button>

                    <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.categories.modal.title') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{ __('admin.categories.modal.body') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.categories.modal.close') }}</button>
                                    <form action="" method="post" id="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('admin.categories.modal.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div id="jstree"></div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('title')
{{ __('admin.categories.index title') }}
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
        $('#edit-btn').attr("href", "categories/" + r[0] + "/edit");
        $('#delete-btn').attr("href", "categories/" + r[0] + "/edit");
        $('#delete-form').attr("action", "categories/" + r[0]);
        $('#edit-btn').removeClass('disabled');
        $('#delete-btn').attr('disabled', false);
    }).jstree({
        'core': {
            'data': {!! $treeJson !!},
            "themes": {
                "variant": "large"
            },
            "multiple" : false,
        },
        "checkbox": {
            "keep_selected_style": true
        },
        "plugins": ["wholerow", ],
    });
    </script>
@endsection
