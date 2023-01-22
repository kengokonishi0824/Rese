<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['time_hour'];

    public function restaurant(){
        return $this->hasMany('App\Models\Restaurant');
    }

    public function reservation(){
        return $this->hasMany('App\Models\Reservation');
    }

}
