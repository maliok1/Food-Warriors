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
        //validate
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        Restaurant::create([
            'user_id' => $user->id,
            'name'=>$request->input('restaurant_name'),
            'city' => $request->input('restaurant_city'),
            'description' =>$request->input('restaurant_description')
        ]);

        Auth::attempt([
            'email'=> $user->email,
            'password' =>$request->input('password')
        ]);
        return redirect('/home');
    }
}
