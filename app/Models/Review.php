<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id','user_id','','stars','comment'];

    public function reservation(){
        return $this->belongsTo('App\Models\Reservation');
    }
}
