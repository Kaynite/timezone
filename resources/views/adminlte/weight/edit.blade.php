@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.weight.edit title') }}
                </div>
                <form action="{{ route('weight.update', $unit->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="unit_ar">{{ __('admin.weight.form.unit_ar') }}</label>
                            <input type="text" class="form-control" id="unit_ar" name="unit_ar" placeholder="{{ __('admin.weight.form.unit_ar placeholder') }}" value="{{ $unit->unit_ar }}">
                            @error('unit_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unit_en">{{ __('admin.weight.form.unit_en') }}</label>
                            <input type="text" class="form-control" id="unit_en" name="unit_en" placeholder="{{ __('admin.weight.form.unit_en placeholder') }}" value="{{ $unit->unit_en }}">
                            @error('unit_en')
                            <small class="form-text text-danger">{{ $message }}</small>
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
{{ __('admin.weight.edit title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection