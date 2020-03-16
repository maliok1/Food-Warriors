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
        $meal = Meal::findOrFail($meal_id);

        $allergen = $request->input('allergen');

        if($meal->allergens()->find($allergen) == null){
            $meal->allergens()->attach($allergen);
        } else {
            session()->flash('duplicate', 'This allergen has already been listed');
        }
       
        return redirect()->back();
    }
}
