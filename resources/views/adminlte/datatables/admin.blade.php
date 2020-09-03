@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admins Control</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{ $dataTable->table(['class' => 'table table-bordered table-hover dataTable table-responsive table-sm']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('adminlte/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/responsive.bootstrap4.min.js') }}"></script>

@endsection

@push('vScripts')
    {{ $dataTable->scripts() }}
@endpush