@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.admins.create.title') }}
                </div>
                <form action="{{ route('admins.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">{{ __('admin.admins.form.username') }}</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="{{ __('admin.admins.form.username placeholder') }}" value="{{ old('username') }}">
                            @error('username')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('admin.admins.form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.admins.form.email placeholder') }}" value="{{ old('email') }}">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('admin.admins.form.password') }}</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('admin.admins.form.password placeholder') }}">
                            @error('password')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">{{ __('admin.admins.form.submit') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('title')
{{ __('admin.admins.create.title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection