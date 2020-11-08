<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait ImagesUpload
{
    public function uploadImages($model, $modelRelation, $formFieldName, $folder)
    {
        if (request()->hasFile($formFieldName)) {
            if(is_array(request($formFieldName))) {
                foreach (request($formFieldName) as $image) {
                    $originalName = $image->getClientOriginalName();
                    $mime         = $image->getClientMimeType();
                    $size         = $image->getSize();
                    $path         = $image->store("$folder/$model->id");
                    
                    $mmm = new Image([
                        'original_name'  => $originalName,
                        'path'           => $path,
                        'mime_type'      => $mime,
                        'size'           => $size,
                    ]);
                    $model->$modelRelation()->save($mmm);
                }
            } else {
                $originalName = request()->file($formFieldName)->getClientOriginalName();
                $mime         = request()->file($formFieldName)->getClientMimeType();
                $size         = request()->file($formFieldName)->getSize();
                $path         = request()->file($formFieldName)->store("$folder/$model->id");
                $mmm = new Image([
                    'original_name'  => $originalName,
                    'path'           => $path,
                    'mime_type'      => $mime,
                    'size'           => $size,
                ]);
                $model->$modelRelation()->save($mmm);
            }
        }
    }

    public function syncImages($model, $modelRelation, $formFieldName, $folder)
    {
        if (request()->hasFile($formFieldName)) {
            if(is_array($model->$modelRelation)) {
                foreach($model->$modelRelation as $modelImage) {
                    $modelImage->delete();
                    Storage::delete($modelImage->path);
                }
            } else {
                if(isset($model->$modelRelation) && $model->$modelRelation != null && !empty($model->$modelRelation)) {
                    $model->$modelRelation->delete();
                    Storage::delete($model->$modelRelation->path);
                }
            }

            if(is_array(request($formFieldName))) {
                foreach (request($formFieldName) as $image) {
                    $originalName = $image->getClientOriginalName();
                    $mime         = $image->getClientMimeType();
                    $size         = $image->getSize();
                    $path         = $image->store("$folder/$model->id");
                    
                    $mmm = new Image([
                        'original_name'  => $originalName,
                        'path'           => $path,
                        'mime_type'      => $mime,
                        'size'           => $size,
                    ]);
                    $model->$modelRelation()->save($mmm);
                }
            } else {
                $originalName = request()->file($formFieldName)->getClientOriginalName();
                $mime         = request()->file($formFieldName)->getClientMimeType();
                $size         = request()->file($formFieldName)->getSize();
                $path         = request()->file($formFieldName)->store("$folder/$model->id");
                $mmm = new Image([
                    'original_name'  => $originalName,
                    'path'           => $path,
                    'mime_type'      => $mime,
                    'size'           => $size,
                ]);
                $model->$modelRelation()->save($mmm);
            }
        }
    }
}
