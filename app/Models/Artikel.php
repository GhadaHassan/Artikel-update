<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'name',
        'username',
        'password',
        'old_password',
        'link',
        'note',
        'modul_id'
    ];

    public function modul(){
        return $this->belongsToMany(Modul::class, 'moduls_artikels');   // class, table between 2 relation m2m
    }

    public function user(){
        return $this->belongsToMany(User::class, 'users_artikels');   // class, table between 2 relation m2m
    }
}
