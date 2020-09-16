@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.shipping.edit title') }}
                </div>
                <form action="{{ route('shipping.update', $shipping->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.shipping.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.shipping.form.name_ar placeholder') }}" value="{{ $shipping->name_ar }}">
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.shipping.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.shipping.form.name_en placeholder') }}" value="{{ $shipping->name_en }}">
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_id">{{ __('admin.shipping.form.user_id') }}</label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $shipping->user_id ? 'selected' : null }}>{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="website">{{ __('admin.shipping.form.website') }}</label>
                            <input type="url" class="form-control" id="website" name="website" placeholder="{{ __('admin.shipping.form.website placeholder') }}" value="{{ $shipping->website }}">
                            @error('website')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('admin.shipping.form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('admin.shipping.form.email placeholder') }}" value="{{ $shipping->email }}">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('admin.shipping.form.phone') }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('admin.shipping.form.phone placeholder') }}" value="{{ $shipping->phone }}">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebook">{{ __('admin.shipping.form.facebook') }}</label>
                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="{{ __('admin.shipping.form.facebook placeholder') }}" value="{{ $shipping->facebook }}">
                            @error('facebook')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter">{{ __('admin.shipping.form.twitter') }}</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="{{ __('admin.shipping.form.twitter placeholder') }}" value="{{ $shipping->twitter }}">
                            @error('twitter')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo">{{ __('admin.shipping.form.logo') }}</label> 
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
{{ __('admin.shipping.edit title') }}
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