<?php
 
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){

        return $this->hasOne('App\Post'); // por default relaciona user->user_id con post->id
        // si el cambio se denominara distinto de la convención se agrega un segundo parámetro
        //return $this->hasOne('App\Post','the_user_id');

    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles(){

        // por defecto la relación se establece en la tabla "role_user"
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        // si la tabla many to many se denomina distinto de la convención lo resuelvo con parámetros
        // los siguientes params son las foreing keys de las tablas
        //return $this->belongsToMany('App\Role','user_roles'),'user_id','role_id';
    }

    public function photos()
    {
        return $this->morphMany('App\Photo','imageable');
    }


    // accessor
    // convencion: get + Nombrecolumna + Attribute
    // un accessor no cambia el valor en la bd, sino cómo lo trae a la app para manipularlo y tenerlo disponible
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // mutator
    // convencion: set + Nombrecolumna + Attribute
    // un mutator cambia un valor antes de pasarlo a la bd
    public function setNameAttribute($value)
    {
         $this->attributes['name'] = strtoupper($value);
    }

}
