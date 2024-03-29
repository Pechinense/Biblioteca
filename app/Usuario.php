<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'nombre', 'email', 'password'
    ];
      

    public function libros(){
        return $this->belongsToMany(Libro::class)->withTimestamps();
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    /* Get the identifier that will be stored in the subject claim of the JWT.
    *
    * @return mixed
    */
   public function getJWTIdentifier()
   {
       return $this->getKey();
   }

   /* Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
    */
   public function getJWTCustomClaims()
   {
       return [];
   }
}
