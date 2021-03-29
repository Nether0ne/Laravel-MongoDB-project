<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\GamesCategories;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class CategoryController extends Controller
{
    public function all()
    {
        return view('categories', ['categories' => Category::all()]);
    }

    public function get($id)
    {
        $documents = GamesCategories::where('category_id', $id)->get(['game_id']);
        $lookingFor = [];

        foreach ($documents as $doc) {
            $lookingFor[] = new ObjectId($doc['game_id']);
        }

        if (count($lookingFor) == 0) {
            abort(404);
        }

        return view('category', [
            'category' => Category::find($id),
            'games' => Game::where([
                '_id' =>
                    ['$in' => $lookingFor]])->get()
        ]);
    }
}
