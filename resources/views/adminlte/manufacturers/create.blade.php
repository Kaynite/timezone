@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.manufacturers.create title') }}
                </div>
                <form action="{{ route('manufacturers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.manufacturers.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.manufacturers.form.name_ar placeholder') }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.manufacturers.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.manufacturers.form.name_en placeholder') }}" value="{{ old('name_en') }}">
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="website">{{ __('admin.manufacturers.form.website') }}</label>
                            <input type="url" class="form-control" id="website" name="website" placeholder="{{ __('admin.manufacturers.form.website placeholder') }}" value="{{ old('website') }}">
                            @error('website')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('admin.manufacturers.form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.manufacturers.form.email placeholder') }}" value="{{ old('email') }}">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('admin.manufacturers.form.phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('admin.manufacturers.form.phone placeholder') }}" value="{{ old('phone') }}">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebook">{{ __('admin.manufacturers.form.facebook') }}</label>
                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="{{ __('admin.manufacturers.form.facebook placeholder') }}" value="{{ old('facebook') }}">
                            @error('facebook')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter">{{ __('admin.manufacturers.form.twitter') }}</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="{{ __('admin.manufacturers.form.twitter placeholder') }}" value="{{ old('twitter') }}">
                            @error('twitter')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">{{ __('admin.manufacturers.form.logo') }}</label> 
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                <label class="custom-file-label" for="logo">{{ __('common.choose file') }}</label>
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
{{ __('admin.manufacturers.create title') }}
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