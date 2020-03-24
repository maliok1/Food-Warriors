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

class RestaurantController extends Controller{
  public function index(){
    $restaurants = Restaurant::all();
    return view('restaurants.index',compact('restaurants'));
}

  public function show($id) 
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> master
  {
      $restaurant = Restaurant::findOrFail($id);
      $user = User::all();
      $comments = Comment::all();
      $replies = CommentReply::all();
      $meals = Meal::all();
      $allergens = Allergen::all();
      return view('restaurants.show', compact('restaurant', 'user','id', 'comments', 'replies', 'meals', 'allergens'));

  }

  public function search(Request $request){
    
      $q = $request->input( 'q' );
      $restaurant = Restaurant::where('name','LIKE','%'.$q.'%')->get();
      if(count($restaurant) > 0)
          return view('restaurants/search-results')->withDetails($restaurant)->withQuery( $q );
      else return view ('restaurants/search-results')->withMessage('No Details found. Try to search again !');
  }
<<<<<<< HEAD
=======
=======
{
    $restaurant = Restaurant::findOrFail($id);
    $user = User::all();
    $comments = Comment::all();
    $replies = CommentReply::all();
    $meals = Meal::all();
    $allergens = Allergen::all();
    return view('restaurants.show', compact('restaurant', 'user','id', 'comments', 'replies', 'meals', 'allergens'));
>>>>>>> michaela
>>>>>>> master

}

