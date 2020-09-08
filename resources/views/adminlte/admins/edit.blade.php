@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.admins.edit.title') }}
                </div>
                <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">{{ __('common.username') }}</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="{{ __('admin.admins.form.username placeholder') }}" value="{{ $admin->username }}">
                            @error('username')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('common.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.admins.form.email placeholder') }}" value="{{ $admin->email }}">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
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
{{ __('admin.admins.edit.title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection