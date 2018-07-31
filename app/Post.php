<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $dirImages = '/images/';

    use SoftDeletes;
    protected $date = ['deleted_at'];

    protected $fillable = ['title','content','path'];

    public function user()
    {

        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo','imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }

    // query scope
    // convención: iniciar con la palabra "scope"
    public function scopeLatest($query){

        return $query->orderBy('id','asc')->get();

    }

    // accessor para el path
    public function getPathAttribute($value){
        return $this->dirImages . $value;
    }

}

