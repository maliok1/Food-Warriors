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

  public function show(User $user){
      return $user;
   }
}
