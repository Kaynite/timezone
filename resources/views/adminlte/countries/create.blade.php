@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.countries.create title') }}
                </div>
                <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.countries.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.countries.form.name_ar placeholder') }}" value="{{ old('username') }}">
                            @error('name_ar')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.countries.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.countries.form.name_en placeholder') }}" value="{{ old('username') }}">
                            @error('name_en')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mob">{{ __('admin.countries.form.mob') }}</label>
                            <input type="text" class="form-control" id="mob" name="mob" placeholder="{{ __('admin.countries.form.mob placeholder') }}" value="{{ old('username') }}">
                            @error('mob')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">{{ __('admin.countries.form.code') }}</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="{{ __('admin.countries.form.code placeholder') }}" value="{{ old('username') }}">
                            @error('code')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site-icon">{{ __('admin.countries.form.logo') }}</label> 
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="site-icon" name="logo">
                                <label class="custom-file-label" for="site-icon">Choose file</label>
                            </div>
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
{{ __('admin.countries.create title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
<script src="{{ asset('adminlte/js/custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection