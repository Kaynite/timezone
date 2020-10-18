<div class="tab-pane fade" id="shipping-info" role="tabpanel" aria-labelledby="shipping-info-tab">
        <div class="form-group">
            <label for="size">Weight</label>
            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight" placeholder="" value="{{ old('weight') ?? $product->weight ?? '' }}">
                    @error('weight')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <select class="form-control" name="weight_id" id="weight_id">
                        @foreach ($weights as $weight)
                        <option value="{{ $weight->id }}" {{ (old('weight_id') ?? $product->weight_id ?? '') == $weight->id ? 'selected' : null }}>{{ $weight->unit }}</option>
                        @endforeach
                    </select>
                </div>
              @error('weight_id')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="size">Dimensions</label>
            <div class="form-group row">
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="size" id="size" placeholder="" value="{{ old('size') ?? $product->size ?? '' }}">
                    @error('size')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <select class="form-control" name="size_id" id="size_id">
                        @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" {{ (old('size_id') ?? $product->size_id ?? '') == $size->id ? 'selected' : null }}>{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
              @error('size_id')
              <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-3">
                <label for="color_id">Color</label>
                <select class="form-control" name="color_id" id="color_id">
                    <option value=""></option>
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}" {{ (old('color_id') ?? $product->color_id ?? '') == $color->id ? 'selected' : null }}>{{ $color->name }}</option>
                    @endforeach
                </select>
                @error('color_id')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-3">
                <label for="manufacturer_id">Manufacturer</label>
                <select class="form-control" name="manufacturer_id" id="manufacturer_id">
                    <option value=""></option>
                    @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ (old('manufacturer_id') ?? $product->manufacturer_id ?? '') == $manufacturer->id ? 'selected' : null }}>{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
                @error('manufacturer_id')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-3">
                <label for="trademark_id">Trademark</label>
                <select class="form-control" name="trademark_id" id="trademark_id">
                    <option value=""></option>
                    @foreach ($trademarks as $trademark)
                    <option value="{{ $trademark->id }}" {{ (old('trademark_id') ?? $product->trademark_id ?? '') == $trademark->id ? 'selected' : null }}>{{ $trademark->name }}</option>
                    @endforeach
                </select>
                @error('trademark_id')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-3">
                <label for="mall_id" class="d-block">Malls</label>
                <select class="form-control select2bs4" name="malls[]" multiple>
                    @foreach ($malls as $mall)
                    <option value="{{ $mall->id }}" {{ (old('mall_id') ?? (isset($product) ? in_array($mall->id, $product->malls()->pluck('mall_id')->toArray()) : null) ?? '') == $mall->id ? 'selected' : null }}>{{ $mall->name }}</option>
                    @endforeach
                </select>
                @error('mall_id')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

</div>
