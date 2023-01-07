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

    public static function doSearch($name, $prefecture_id,  $category_id)
    {
        $query = self::query();
        if (!empty($name)) {
            $query->where('name', 'like binary', "%{$name}%");
        }
        if (!empty($prefecture_id)) {
            $query->where('prefecture_id', "{$prefecture_id}");
        }
        if (!empty($category_id)) {
            $query->where('category_id', "{$category_id}");
        }
        $results = $query->get();
        return $results;
    }

    public function like(){
        return $this->hasMany('App\Models\Like')->first();
    }

    public function reservation(){
        return $this->hasMany('App\Models\Reservation');
    }
}
