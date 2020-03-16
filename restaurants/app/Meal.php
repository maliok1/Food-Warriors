<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
    
    public function allergens()
    {
        return $this->hasMany(Allergen::class);
    }
}
