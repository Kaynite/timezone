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
                        <button type="submit" name="mainImage" value="{{ $image->id }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></button>
                        @endif
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{ 'image_' . $image->id }}">
                           <i class="fas fa-trash"></i>
                        </button>
                        <div class="modal fade" id="{{ 'image_' . $image->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure You Want To Delete image {{ $image->original_name }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="deleteImage" value="{{ $image->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
        <label for="site-icon">{{ __('admin.products.images') }}</label> 
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="images[]" id="images" accept="image/*" multiple="multiple">
            <label class="custom-file-label" for="site-icon">Choose file</label>
        </div>
    </div>

</div>