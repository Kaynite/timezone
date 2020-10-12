<div class="tab-pane fade active show" id="title-tab" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
    <div class="form-group">
        <label for="title_ar">{{ __('admin.products.form.title_ar') }}</label>
        <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar" placeholder="{{ __('admin.products.form.title_ar placeholder') }}" value="{{ old('title_ar') ?? $product->title_ar ?? '' }}">
        <small class="form-text text-danger" id="title_ar_help">
            @error('title_ar')
            {{ $message }}
            @enderror
        </small>
    </div>

    <div class="form-group">
        <label for="title_en">{{ __('admin.products.form.title_en') }}</label>
        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" placeholder="{{ __('admin.products.form.title_en placeholder') }}" value="{{ old('title_en') ?? $product->title_en ?? '' }}">
        @error('title_en')
        <small class="form-text text-danger">
            {{ $message }}
        </small>
        @enderror
    </div>

    <div class="form-group">
        <label for="slug">{{ __('admin.products.form.slug') }}</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="{{ __('admin.products.form.slug placeholder') }}" value="{{ old('slug') ?? $product->slug ?? '' }}">
        <small id="slug-error" class="form-text text-danger">
            @error('slug') {{ $message }} @enderror
        </small>
    </div>

    <div class="form-group">
        <label for="description">{{ __('admin.products.form.description') }}</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') ?? $product->description ?? '' }}</textarea>
        @error('description')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="overview">{{ __('admin.products.form.overview') }}</label>
        <textarea name="overview" id="overview" class="form-control @error('overview') is-invalid @enderror" rows="5">{{ old('overview') ?? $product->overview ?? '' }}</textarea>
        @error('overview')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>