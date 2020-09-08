@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.userstypes.edit title') }}</h3>
                </div>
                <form action="{{ route('userstypes.update', $type->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_en">{{ __('admin.userstypes.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.userstypes.form.name_en placeholder') }}" value="{{ $type->name_en }}" required>
                            @error('name_en')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group" style="direction: rtl">
                            <label for="name_ar">{{ __('admin.userstypes.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.userstypes.form.name_ar placeholder') }}" value="{{ $type->name_ar }}" required>
                            @error('name_ar')
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
{{ __('admin.userstypes.edit title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection