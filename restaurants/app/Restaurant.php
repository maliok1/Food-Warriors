<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'city',
        'description',
        'image'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
