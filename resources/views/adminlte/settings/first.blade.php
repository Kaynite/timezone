@extends('adminlte.layouts.main')

@section('content')
    <!-- TODO: Make the first time settings as steps -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('admin.settings.title') }}</h5>
                </div>

                <form action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.settings.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar" class="form-control" placeholder="">
                        </div>
    
                        <div class="form-group">
                            <label for="name_en">{{ __('admin.settings.name_en') }}</label>
                            <input type="text" name="name_en" id="name_en" class="form-control" placeholder="">
                        </div>
    
                        <div class="form-group">
                            <label for="description_ar">{{ __('admin.settings.description_ar') }}</label>
                            <textarea class="form-control" name="description_ar" id="description_ar" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{ __('admin.settings.description_en') }}</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="3"></textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="keywords">{{ __('admin.settings.keywords') }}</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="3"></textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="email">{{ __('common.email') }}</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="">
                        </div>
    
                        <div class="form-group">
                            <label for="site-logo">{{ __('admin.settings.logo') }}</label> 
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="site-logo" name="logo">
                                <label class="custom-file-label" for="site-logo">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site-icon">{{ __('admin.settings.icon') }}</label> 
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="site-icon" name="icon">
                                <label class="custom-file-label" for="site-icon">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('admin.settings.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">{{ __('admin.settings.open') }}</option>
                                <option value="0">{{ __('admin.settings.closed') }}</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="message">{{ __('admin.settings.message') }}</label>
                            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
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
{{ __('admin.settings.title') }}
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