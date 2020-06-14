<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'users_moduls');   // class, table between 2 relation m2m
    }

    public function artikel(){
        return $this->belongsToMany(Artikel::class, 'moduls_artikels');   // class, table between 2 relation m2m
    }
}
