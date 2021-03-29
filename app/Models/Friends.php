<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Friends extends Model
{
    protected $collection = 'friends';
    protected $fillable = [
        'user_id',
        'friend_id'
    ];
}
