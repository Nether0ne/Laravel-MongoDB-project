<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $collection = 'categories';
    protected $fillable = [
        'name',
        'description'
    ];
}
