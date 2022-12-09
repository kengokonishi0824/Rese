<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','prefecture_id','category_id','overview','picture'];

    public function prefecture(){
				return $this->belongsTo('App\Models\Prefecture');
    }

    public function category(){
				return $this->belongsTo('App\Models\Category');
    }
}
