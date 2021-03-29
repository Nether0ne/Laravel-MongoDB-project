<?php

namespace App\Http\Controllers;

use App\Models\BoughtGames;
use App\Models\Friends;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;

class UserController extends Controller
{
    public function all()
    {
        return view('users', ['users' => User::all()]);
    }

    public function get($id)
    {
        $user = User::find($id);

        $friends = Friends::where('user_id', $id)->get(['friend_id'])->count();

        return view('user', [
            'user' => $user,
            'registration_at' => $user->registration_date->toDateTime(),
            'friends' => $friends
        ]);
    }

    public function friends($id)
    {
        $user = User::find($id);

        $friends = Friends::where('user_id', $id)->get(['friend_id']);
        $lookingFor = [];

        foreach ($friends as $f) {
            $lookingFor[] = new ObjectId($f['friend_id']);
        }

        return view('friends', [
            'user' => $user,
            'friends' => User::where([
                '_id' =>
                    ['$in' => $lookingFor]])->get()
        ]);
    }

    public function library()
    {
        $userId = Auth::id();

        $games = BoughtGames::where('user_id', $userId)->get(['game_id']);
        $lookingFor = [];

        foreach ($games as $g) {
            $lookingFor[] = new ObjectId($g->game_id);
        }

        return view('library', [
            'games' => Game::where([
                '_id' =>
                    ['$in' => $lookingFor]])->get()
        ]);
    }
}
