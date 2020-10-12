<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['imageable_id', 'imageable_type', 'original_name', 'path', 'mime_type', 'size', 'product_id'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
