<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'username',
        'email',
        'password',
    ];

    public function hasGame($id)
    {
        return BoughtGames::where('user_id', auth()->id())->where('game_id', $id)->count() > 0;
    }
}
