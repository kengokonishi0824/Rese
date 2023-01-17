<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Review;

class AdminController extends Controller
{
    public function manageRestaurant()
    {
        return view('adminManager');
    }

    public function admin()
    {
        $restaurants = Restaurant::all();
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $param = ['restaurants' => $restaurants,'prefectures' => $prefectures,'categories' => $categories];
        return view('admin.admin',$param);
    }

        public function restaurantAll(Request $request)
    {
        $user = Auth::user();
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $likes = Like::all();
        $areas = Restaurant::all()->keyBy('prefecture_id');
        $name = $request['name'];
        $prefecture_id = $request['prefecture_id'];
        $category_id= $request['category_id'];
        $restaurants = Restaurant::doSearch($name, $prefecture_id, $category_id);
        $param = ['user' => $user,'prefectures' => $prefectures,'categories' => $categories, 'likes' => $likes,'areas'=>$areas];
        return view('admin.restaurantAll', ['restaurants' => $restaurants,'name' => $name, 'prefecture_id' => $prefecture_id, 'category_id' => $category_id],$param);
    }
}
