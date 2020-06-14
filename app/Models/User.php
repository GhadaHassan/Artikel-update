<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function modul(){
        return $this->belongsToMany(Modul::class, 'users_moduls');   // class, table between 2 relation m2m
    }

    public function artikel(){
        return $this->belongsToMany(Artikel::class, 'users_artikels');   // class, table between 2 relation m2m
    }
}
