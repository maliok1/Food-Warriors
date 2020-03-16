<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
