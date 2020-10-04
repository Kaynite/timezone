<div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="Price" step="0.01" value="{{ old('price') ?? $product->price ?? '' }}">
        @error('price')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="stock" value="{{ old('stock') ?? $product->stock ?? '' }}">
        @error('stock')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label for="stock_starts_at">Starts at</label>
            <input type="date" class="form-control" name="stock_starts_at" id="stock_starts_at" placeholder="stock_starts_at" value="{{ old('stock_starts_at') ?? $product->stock_starts_at ?? '' }}">
            @error('stock_starts_at')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="form-group col-lg-6">
            <label for="stock_ends_at">Ends at</label>
            <input type="date" class="form-control" name="stock_ends_at" id="stock_ends_at" placeholder="stock_ends_at" value="{{ old('stock_ends_at') ?? $product->stock_ends_at ?? '' }}">
            @error('stock_ends_at')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <hr class="mt-3">

    <div class="form-group">
        <label for="offer_price">Offer Price</label>
        <input type="number" class="form-control" name="offer_price" id="offer_price" placeholder="offer_price" step="0.01" value="{{ old('offer_price') ?? $product->offer_price ?? '' }}">
        @error('offer_price')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label for="offer_starts_at">Offer Starts at</label>
            <input type="date" class="form-control" name="offer_starts_at" id="offer_starts_at" placeholder="offer_starts_at" value="{{ old('offer_starts_at') ?? $product->offer_starts_at ?? '' }}">
            @error('offer_starts_at')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="form-group col-lg-6">
            <label for="offer_ends_at">Offer Ends at</label>
            <input type="date" class="form-control" name="offer_ends_at" id="offer_ends_at" placeholder="offer_ends_at" value="{{ old('offer_ends_at') ?? $product->offer_ends_at ?? '' }}">
            @error('offer_ends_at')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

</div>