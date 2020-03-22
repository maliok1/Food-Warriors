<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Comment;
class CommentsController extends Controller
{
    public function store(Request $request, $restaurant_id){
        $this->validate($request, [
            'comment' => 'required'
        ]); 

        $restaurant = Restaurant::findOrFail($restaurant_id);
       
        $comment = new Comment;
        
        $comment->restaurant_id = $restaurant_id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');

        $comment->save();
        session()->flash('success_massage', 'Review saved.');

        return redirect()-> back();
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}