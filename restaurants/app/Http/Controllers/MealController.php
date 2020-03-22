<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Comment;
use App\CommentReply;
use App\Meal;
use App\Allergen;

class MealController extends Controller
{   
    

    public function storeMeal(Request $request, $restaurant_id){
        $restaurant = Restaurant::findOrFail($restaurant_id);

        if ($file = $request->file('image_file')) {
            $original_name = $file->getClientOriginalName();
            
            $file->storeAs('meals',   $original_name,  'uploads');
        }





        $meal = new Meal;

        $meal->restaurant_id = $restaurant_id;
        $meal->name = $request->input('name');
        $meal->description = $request->input('description');
        $meal->price = $request->input('price');
        $meal->pickup_time_start = $request->input('pickup_time_start');
        $meal->pickup_time_end = $request->input('pickup_time_end');
        $meal->image = '/uploads/meals/'.$original_name;
        $meal->save();

        return redirect()->back();
    }

    public function deleteMeal($id){
        $meal = Meal::find($id);
        $meal->delete();
        return redirect()->back();
    }
}
