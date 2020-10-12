<?php

namespace App\Traits;

use App\Models\Image;

trait ImagesUpload
{
    public function upload($model, $form, $folder)
    {
        if (request()->hasFile($form)) {

            foreach (request($form) as $image) {
                $originalName = $image->getClientOriginalName();
                $mime         = $image->getClientMimeType();
                $size         = $image->getSize();
                $path         = $image->store("$folder/$model->id");

                Image::create([
                    'imageable_id'  => $model->id,
                    'imageable_type'  => get_class($model),
                    'original_name' => $originalName,
                    'path'          => $path,
                    'mime_type'     => $mime,
                    'size'          => $size,
                ]);
            }

        }
    }
}
