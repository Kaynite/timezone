@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.malls.create title') }}
                </div>
                <form action="{{ route('malls.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.malls.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.malls.form.name_ar placeholder') }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.malls.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.malls.form.name_en placeholder') }}" value="{{ old('name_en') }}">
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- TODO: Put country creation link if no countries available! -->
                        <!-- TODO: Make country required! -->
                        <div class="form-group">
                            <label for="country_id">{{ __('admin.malls.form.country_id') }}</label>
                            <select class="form-control" name="country_id" id="country_id">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('admin.malls.form.address') }}</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('admin.malls.form.address placeholder') }}" value="{{ old('address') }}">
                            @error('address')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="website">{{ __('admin.malls.form.website') }}</label>
                            <input type="url" class="form-control" id="website" name="website" placeholder="{{ __('admin.malls.form.website placeholder') }}" value="{{ old('website') }}">
                            @error('website')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('admin.malls.form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.malls.form.email placeholder') }}" value="{{ old('email') }}">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('admin.malls.form.phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('admin.malls.form.phone placeholder') }}" value="{{ old('phone') }}">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebook">{{ __('admin.malls.form.facebook') }}</label>
                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="{{ __('admin.malls.form.facebook placeholder') }}" value="{{ old('facebook') }}">
                            @error('facebook')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter">{{ __('admin.malls.form.twitter') }}</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="{{ __('admin.malls.form.twitter placeholder') }}" value="{{ old('twitter') }}">
                            @error('twitter')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">{{ __('admin.malls.form.logo') }}</label> 
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
{{ __('admin.malls.create title') }}
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