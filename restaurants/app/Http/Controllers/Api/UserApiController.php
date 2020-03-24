<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserApiController extends Controller
{
    public function index(){
      return User::all()->get();
    }
}
