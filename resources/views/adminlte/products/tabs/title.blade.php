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
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">{{ __('admin.products.form.content') }}</label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ old('content') ?? $product->content ?? '' }}</textarea>
        @error('content')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <hr class="mt-4">

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
            <option value="accepted" {{ (old('status') ?? $product->status ?? '') == 'accepted' ? 'selected' : null }}>Accepted</option>
            <option value="pending" {{ (old('status') ?? $product->status ?? '') == 'pending' ? 'selected' : null }}>Pending</option>
            <option value="rejected" {{ (old('status') ?? $product->status ?? '') == 'rejected' ? 'selected' : null }}>Rejected</option>
        </select>
    </div>
    <div class="form-group">
      <label for="rejection_reason">Rejection Reason</label>
      <textarea class="form-control @error('rejection_reason') is-invalid @enderror" name="rejection_reason" id="rejection_reason" rows="3">{{ old('rejection_reason') ?? $product->rejection_reason ?? '' }}</textarea>
      @error('rejection_reason')
      <small class="form-text text-danger">{{ $message }}</small>
      @enderror
    </div>
</div>