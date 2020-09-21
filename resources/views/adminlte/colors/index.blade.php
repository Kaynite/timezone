@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.colors.index title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form id="multipleDeleteForm" class="w-100" action="{{ route('colors.multipleDelete') }}" method="POST">
                            @csrf
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered table-hover dataTable table-sm']) }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalTitle">{{ __('admin.colors.modal.title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('admin.colors.modal.body') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin.admins.modal.close') }}</button>
                    <button type="button" onclick="multipleDeleteSubmit()" class="btn btn-danger">{{ __('admin.admins.modal.delete') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
{{ __('admin.colors.index title') }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/responsive.bootstrap4.min.css') }}">
    <style>
        #admindatatable-table_wrapper {
            width:100%;
        }
    </style>
@endsection

@section('scripts')

    <script>
        function checkAll() {
            $('.table-row-checkbox').each(function() {
                if ($('input[id="checkAllCheckbox"]:checkbox:checked').length == 0) {
                    $(this).prop('checked', false)
                } else {
                    $(this).prop('checked', true)
                }
            })
        }

        $(document).on('click','.deleteAllBtn', function() {
            $('#deleteAllModal').modal('show')
        });

        function multipleDeleteSubmit() {
            document.getElementById('multipleDeleteForm').submit();
        }
    </script>

@endsection

@push('vScripts')
    <script src="{{ asset('adminlte/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush