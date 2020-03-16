<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public function meals(){
        return $this->belongsToMany(Meal::class);
    }
}
