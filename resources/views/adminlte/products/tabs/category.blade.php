<div class="tab-pane fade" id="product-category" role="tabpanel" aria-labelledby="product-category-tab">
    @if ($treeJson != "[]")
    <div class="form-group">
        <div id="jstree"></div>
        <input type="hidden" name="category_id" value="{{ old('category_id') ?? $product->category_id ?? '' }}" id="category_id">
        @error('category_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    @endif
</div>