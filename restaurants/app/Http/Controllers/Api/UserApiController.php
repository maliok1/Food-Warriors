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
      $user = User::where('name', $user)->firstOrFail();

      $file_name = null;
      if ($file = $request->file('image_file')) {
        $file_name = time() . '_'. $file->getClientOriginalName();
        $file->storeAs('users',   $file_name,  'uploads');
    }
      $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phonenumber' => $request->input('phonenumber'),
        'image' => $file_name ? '/uploads/users/'.$file_name : $user->image
      ]); 
      return $user;
    }

  public function show(User $user){
      return $user;
   }

  
}
