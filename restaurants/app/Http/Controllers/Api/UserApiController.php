<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserApiController extends Controller
{ 
 

  public function index(){
    return User::get();
  }


  public function update($user, Request $request){
    //   $request->validate([
    //     'name' => 'required|string|max:255'
    // ]);

      $user = User::where('name', $user)->firstOrFail();

      $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email')
      ]); 
      return $user;
    }

  public function show(User $user){
      return $user;
   }

  
}
