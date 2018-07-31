<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){

        //el tercer y cuarto parámetro en este caso no harían falta porque se siguió la convención
        // para los nombres de columnas
        //return $this->hasManyThrough('App\Post','App\User','country_id','user_id');
        return $this->hasManyThrough('App\Post','App\User');


    }
}
