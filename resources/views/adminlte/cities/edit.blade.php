@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title">
                        {{ __('admin.cities.edit title') }}
                    </h5>
                </div>
                <form action="{{ route('cities.update', $city->id) }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.cities.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.cities.form.name_ar placeholder') }}" value="{{ $city->name_ar }}" required>
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.cities.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.cities.form.name_en placeholder') }}" value="{{ $city->name_en }}" required>
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="country_id">{{ __('admin.cities.form.country') }}</label>
                            <select class="form-control" name="country_id" id="country_id" required>
                                <option selected disabled>{{ __('admin.cities.form.country placeholder') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $city->country_id ? 'selected' : Null }} >{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
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
{{ __('admin.cities.edit title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
    {{-- Scripts Goes Here --}}
@endsection