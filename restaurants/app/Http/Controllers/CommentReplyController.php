<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Comment;
use App\CommentReply;
use App\Meal;

class CommentReplyController extends Controller
{
   public function store(Request $request, $comment_id){
    $comment = Comment::findOrFail($comment_id);
   
    $reply = new CommentReply;
    
    $reply->comment_id = $comment_id;
    $reply->reply = $request->input('reply');
    $reply->save();

    session()->flash('success_massage', 'Review saved.');
    return redirect()-> back();
   }
}
