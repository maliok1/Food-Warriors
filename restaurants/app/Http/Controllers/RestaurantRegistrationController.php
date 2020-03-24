<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Comment;
use App\CommentReply;
use App\Meal;
use App\Allergen;


class RestaurantRegistrationController extends Controller
{
    public function form()
    {
        return view('auth.restaurant-register');
    }
    public function register(Request $request)
    {    
        
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        if ($file = $request->file('image_file')) {
                    $original_name = $file->getClientOriginalName();
                    
                    $file->storeAs('restaurants',   $original_name,  'uploads');
                }
        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name'=>$request->input('restaurant_name'),
            'city' => $request->input('restaurant_city'),
            'address_address' => $request->input('address_address'),
            'address_latitude' => $request->input('address_latitude'),
            'address_longitude' => $request->input('address_longitude'),
            'description' =>$request->input('restaurant_description'),
            'image' => '/uploads/restaurants/'.$original_name
        ]);

        Auth::attempt([
            'email'=> $user->email,
            'password' =>$request->input('password')
        ]);
        return redirect('/');
    }
}
