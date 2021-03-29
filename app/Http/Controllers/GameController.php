<?php

namespace App\Http\Controllers;

use App\Models\BoughtGames;
use App\Models\Category;
use App\Models\Game;
use App\Models\GamesCategories;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class GameController extends Controller
{
    public function all()
    {
        return view('games', ['games' => Game::all()]);
    }

    public function get($id)
    {
        $documents = GamesCategories::where('game_id', $id)->get(['category_id']);
        $lookingFor = [];

        foreach ($documents as $doc) {
            $lookingFor[] = new ObjectId($doc['category_id']);
        }

        if (count($lookingFor) == 0) {
            abort(404);
        }

        return view('game', [
            'game' => Game::find($id),
            'categories' => Category::where([
                '_id' =>
                    ['$in' => $lookingFor]])->get()
        ]);
    }

    public function buy(Request $request, Response $response)
    {
        $id = $request->_id;
        $game = Game::find($id);

        $price = isset($game->discount_price) ? $game->discount_price : $game->price;

        if (intval(auth()->user()->balance) >= $price) {
            $user = User::find(auth()->id());

            $boughtGame = new BoughtGames();
            $boughtGame->game_id = $id;
            $boughtGame->user_id = $user->_id;
            $boughtGame->price = $price;

            $boughtGame->save();

            $user->decrement('balance', $price);
            return redirect('library');
        }

        return redirect()->back();
    }
}
