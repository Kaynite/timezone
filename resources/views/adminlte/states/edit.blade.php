@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    {{ __('admin.states.create title') }}
                </div>
                <form action="{{ route('states.update', $state->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_ar">{{ __('admin.states.form.name_ar') }}</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{ __('admin.states.form.name_ar placeholder') }}" value="{{ $state->name_ar }}" required>
                            @error('name_ar')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('admin.states.form.name_en') }}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{ __('admin.states.form.name_en placeholder') }}" value="{{ $state->name_en }}" required>
                            @error('name_en')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="city_id">{{ __('common.city') }}</label>
                            <select class="form-control" name="city_id" id="city_id" required>
                                <option selected disabled>{{ __('admin.cities.form.city placeholder') }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $state->city_id ? 'selected' : null }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group" id="country_select" style="">
                            <label for="country_id">{{ __('admin.cities.form.country') }}</label>
                            <select class="form-control" name="country_id" id="country_id" required>
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
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
{{ __('admin.states.edit title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')

<script>

    var city = document.getElementById('city_id');


    city.addEventListener('change', function() {
        var city_id = $("#city_id").val();
        if (city_id > 0) {
            $.ajax({
                type: "GET",
                url: "{{ route('states.create') }}",
                data: {
                    'city_id': city_id
                },
                cache: false,
                success: function(data){
                    $("#country_id").html(data);
                }
            });
        }
    });

</script>

@endsection