<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//Route::get('/', 'RestaurantController@index');
Route::get('/restaurant-registration', 'RestaurantRegistrationController@form');
Route::post('/restaurant-registration', 'RestaurantRegistrationController@register');

Route::get('/', 'RestaurantController@index')->name('home');


Route::post('/comment/{id}', 'CommentsController@store')->middleware('auth');
Route::get('/restaurant/{id}', 'RestaurantController@show');



Route::delete('/comment/{id}/delete', 'CommentsController@deleteComment')->middleware('auth');

Route::post('/comment/{id}/reply', 'CommentReplyController@store')->middleware('auth');




// Meal
Route::post('/restaurant/{id}/meal', 'MealController@storeMeal');
Route::delete('/restaurant/{id}/delete', 'MealController@deleteMeal');

// Cart

 Route::post('/restaurant/{id}', 'MealController@cart');
 Route::get('/cart', 'MealController@showCart');


//Allergen

Route::post('/restaurant/add-allergen/{meal_id}', 'AllergenController@addAllergen');
Route::get('/restaurant/remove-allergen/{meal_id}', 'AllergenController@removeAllergen');


// Search

Route::post('/search', 'RestaurantController@search');


// //Users
Route::get('/users/{path?}', 'UserController@index');
Route::get('/user/{path?}', 'UserController@index');

// Footer links
Route::get( '/about', function(){
    return view( 'users.about' );
} )->where('path', '.*');

Route::get( '/contact', function(){
    return view( 'users.contact' );
} )->where('path', '.*');

Route::get( '/news', function(){
    return view( 'users.news' );
} )->where('path', '.*');
