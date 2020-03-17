<?php

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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restaurant-registration', 'RestaurantRegistrationController@form');
Route::post('/restaurant-registration', 'RestaurantRegistrationController@register');

Route::get('/', 'RestaurantController@index');

Route::post('/comment/{id}', 'CommentsController@store')->middleware('auth');
Route::get('/restaurant/{id}', 'RestaurantController@show');

Route::delete('/comment/{id}/delete', 'CommentsController@deleteComment')->middleware('auth');

Route::post('/comment/{id}/reply', 'CommentReplyController@store')->middleware('auth');




// Meal
Route::post('/restaurant/{id}/meal', 'MealController@storeMeal');
Route::delete('/restaurant/{id}/delete', 'MealController@deleteMeal');


//Allergen

Route::post('/restaurant/add-allergen/{meal_id}', 'AllergenController@addAllergen');
Route::get('/restaurant/remove-allergen/{meal_id}', 'AllergenController@removeAllergen');
