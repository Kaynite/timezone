<?php

namespace App\Traits;

use App\Models\Image;

trait ImagesUpload
{
    public function upload($model, $form, $folder)
    {
        if (request()->hasFile($form)) {
            if(is_array(request($form))) {
                foreach (request($form) as $image) {
                    $originalName = $image->getClientOriginalName();
                    $mime         = $image->getClientMimeType();
                    $size         = $image->getSize();
                    $path         = $image->store("$folder/$model->id");
    
                    Image::create([
                        'imageable_id'   => $model->id,
                        'imageable_type' => get_class($model),
                        'original_name'  => $originalName,
                        'path'           => $path,
                        'mime_type'      => $mime,
                        'size'           => $size,
                    ]);
                }
            } else {
                $originalName = request()->file($form)->getClientOriginalName();
                $mime         = request()->file($form)->getClientMimeType();
                $size         = request()->file($form)->getSize();
                $path         = request()->file($form)->store("$folder/$model->id");

                Image::create([
                    'imageable_id'   => $model->id,
                    'imageable_type' => get_class($model),
                    'original_name'  => $originalName,
                    'path'           => $path,
                    'mime_type'      => $mime,
                    'size'           => $size,
                ]);
            }


        }
    }
}
