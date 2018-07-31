<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // nombre de función por convención para relación polimórfica
    public function imageable(){
        return $this->morphTo();
    }
}
