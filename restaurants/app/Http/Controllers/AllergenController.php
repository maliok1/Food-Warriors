<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Comment;
use App\CommentReply;
use App\Meal;
use App\Allergen;

class AllergenController extends Controller
{
    public function addAllergen(Request $request, $meal_id)
    {
        $meal = Meal::find($meal_id);

        $allergen = new Allergen;

        $allergen->meal_id = $meal_id;

        $allergen->name = $request->input('allergen');

        $allergen->save();
       
        return redirect()->back();
    }
}
