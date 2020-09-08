@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.admins.create.title') }}
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">{{ __('common.username') }}</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="{{ __('admin.admins.form.username placeholder') }}" value="{{ old('username') }}" required>
                            @error('username')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('common.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.admins.form.email placeholder') }}" value="{{ old('email') }}" required>
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('common.password') }}</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('admin.admins.form.password placeholder') }}" required>
                            @error('password')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_type_id">{{ __('admin.users.form.user type') }}</label>
                            <select name="user_type_id" class="form-control" required>
                                <option disabled="" selected="">{{ __('admin.users.form.select placeholder') }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('user_type_id')
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
{{ __('admin.users.create title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection