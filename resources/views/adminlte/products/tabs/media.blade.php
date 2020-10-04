<div class="tab-pane fade" id="product-media" role="tabpanel" aria-labelledby="product-media-tab">
    @if (isset($product_images) && $product->images->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ Storage::url($image->path) }}" alt="" style="max-width: 100px"></td>
                    <td>{{ $image->original_name }}</td>
                    <td>{{ $image->size/1000 }} KB</td>
                    <td class="text-center">
                        @if ($image->id != $product->image_id)
                        <button type="button" onclick="window.location.href='{{ route('products.mainImage', [$product->id, $image->id]) }}'" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></button>
                        @endif
                        <button type="button" class="btn btn-danger btn-sm image-delete-btn" data-id="{{ $image->id }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mb-3">
            {{ $product_images->links() }}
        </div>

        <hr class="mt-3">
    @endif

    <div class="form-group">
        <label for="site-icon">{{ __('admin.products.form.image') }}</label> 
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="images[]" id="images" accept="image/*" multiple="multiple">
            <label class="custom-file-label" for="site-icon">Choose file</label>
        </div>
    </div>

</div>