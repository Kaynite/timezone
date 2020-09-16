@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.malls.edit title') }}
                </div>
                <form action="{{ route('malls.update', $mall->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.malls.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.malls.form.name_ar placeholder') }}" value="{{ $mall->name_ar }}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.malls.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.malls.form.name_en placeholder') }}" value="{{ $mall->name_en }}">
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id">{{ __('admin.malls.form.country_id') }}</label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $mall->country_id ? 'selected' : null }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="website">{{ __('admin.malls.form.website') }}</label>
                            <input type="url" class="form-control" id="website" name="website" placeholder="{{ __('admin.malls.form.website placeholder') }}" value="{{ $mall->website }}">
                            @error('website')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('admin.malls.form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.malls.form.email placeholder') }}" value="{{ $mall->email }}">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('admin.malls.form.phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('admin.malls.form.phone placeholder') }}" value="{{ $mall->phone }}">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebook">{{ __('admin.malls.form.facebook') }}</label>
                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="{{ __('admin.malls.form.facebook placeholder') }}" value="{{ $mall->facebook }}">
                            @error('facebook')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter">{{ __('admin.malls.form.twitter') }}</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="{{ __('admin.malls.form.twitter placeholder') }}" value="{{ $mall->twitter }}">
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
{{ __('admin.malls.edit title') }}
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