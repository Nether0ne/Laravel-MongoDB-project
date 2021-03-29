<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class BoughtGames extends Model
{
    protected $collection = 'bought_games';
    protected $fillable = [
        'game_id',
        'user_id',
        'price',
        'date'
    ];
}
