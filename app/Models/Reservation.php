<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id','user_id','reservation_date','reservation_time','number_people'];

    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function review(){
        return $this->Hasmany('App\Models\Review');
    }
}
