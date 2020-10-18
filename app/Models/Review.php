<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name', 'review', 'user_id', 'product_id', 'rating'
    ];
}
