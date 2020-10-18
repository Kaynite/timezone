<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'views'];

    public function cover()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
