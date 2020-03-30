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
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'pickup_time_start' => 'required',
            'pickup_time_end' => 'required',
            'image' => 'nullable',
            'quantity' => 'nullable'
        ]);
        
        
        $meal = new Meal;
        if ($file = $request->file('image_file')) {
            $original_name = $file->getClientOriginalName();
            $file->storeAs('meals',   $original_name,  'uploads');
            $meal->image = '/uploads/meals/'.$original_name;
        }

        

        $meal->restaurant_id = $restaurant_id;
        $meal->name = $request->input('name');
        $meal->description = $request->input('description');
        $meal->price = $request->input('price');
        $meal->quantity = $request->input('quantity');
        $meal->pickup_time_start = $request->input('pickup_time_start');
        $meal->pickup_time_end = $request->input('pickup_time_end');
       
        $meal->save();

        return redirect()->back();
    }

    public function deleteMeal($id){
        $meal = Meal::find($id);
        $meal->delete();
        return redirect()->back();
    }

    public function showCart() {

        return view('restaurants.cart');
    }

    public function cart($id) {

        $meal = Meal::find($id);

    if ($meal->quantity > 0) {
        $meal->decrement('quantity');
        $meal->save();

        return view('restaurants.cart');
    }else {

        return redirect()->back();
        }
      }
 }
