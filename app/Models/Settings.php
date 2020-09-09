<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'name_ar',
        'name_en',
        'description',
        'keywords',
        'email',
        'logo',
        'icon',
        'status',
        'message'
    ];
    public $timestamps = false;
    
}
