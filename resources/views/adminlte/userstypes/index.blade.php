@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.userstypes.index title') }}</h3>
                </div>
                <div class="card-body pb-0 mb-0">
                    <a href="{{ route('userstypes.create') }}" class="btn btn-info mb-3"><i class="fa fa-plus"></i> {{ __('admin.userstypes.create title') }}</a>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2em">{{ __('common.hashid') }}</th>
                                <th>{{ __('common.title') }}</th>
                                <th>{{ __('common.actions')  }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                            <tr>
                                <td class="text-center">{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <a href="{{ route('userstypes.edit', $type->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#deleteUserType{{ $type->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteUserType{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.userstypes.modal.title') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('admin.userstypes.modal.body with name', ['type' => $type->name]) }}
                                                    <div class="text-danger">
                                                        {{ __('admin.userstypes.modal.body note') }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('common.close') }}</button>
                                                    <form action="{{ route('userstypes.destroy', $type->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">{{ __('common.delete') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $types->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('title')
{{ __('admin.userstypes.index title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection