<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class GamesCategories extends Model
{
    protected $collection = 'games_categories';
    protected $fillable = [
        'game_id',
        'category_id'
    ];
}
