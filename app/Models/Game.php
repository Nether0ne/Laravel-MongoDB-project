<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Game extends Model
{
    protected $collection = 'games';
    protected $fillable = [
        'name',
        'info',
        'price',
        'discount_price'
    ];
}
