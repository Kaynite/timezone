<?php

namespace App\Traits;

use App\Models\ProductImage;

trait ProductsImagesUpload
{
    public function upload($form, $id)
    {
        if (request()->hasFile($form)) {

            foreach (request($form) as $image) {
                $originalName = $image->getClientOriginalName();
                $mime         = $image->getClientMimeType();
                $size         = $image->getSize();
                $path         = $image->store("products/$id");

                ProductImage::create([
                    'original_name' => $originalName,
                    'path'          => $path,
                    'mime_type'     => $mime,
                    'size'          => $size,
                    'product_id'    => $id,
                ]);
            }
            
        }
    }
}
