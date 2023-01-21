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
use Carbon\Carbon;

class AdminController extends Controller
{
    public function manageRestaurant()
    {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('admin.adminManager',$param);
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

    public function adminDetail($id)
    {
        $user = Auth::user();
        $restaurants = Restaurant::all()->find($id);
        return view('admin.adminDetail',['user' =>$user,'restaurants' => $restaurants]);
    }

    public function adminAddRestaurant()
    {
        $categories = Category::all();
        $prefectures = Prefecture::all();
        $param = ['prefectures' => $prefectures,'categories' => $categories];
        return view('admin.addRestaurant',$param);
    }
    
    public function addRestaurant(Request $request)
    {
        $form = $request->all();
        Restaurant::create($form);
        return redirect('admin.admin');;
    }

    public function adminChange($id)
    {
        $user = Auth::user();
        $restaurants = Restaurant::all()->find($id);
        return view('admin.adminChange',['user' =>$user,'restaurants' => $restaurants]);
    }

    public function adminChangeRestaurant(Request $request)
    {
        $user = Auth::user();
        $form = $request->all();
        Restaurant::find($request->id)->update($form);
        return view('admin.adminManager',['user'=>$user]);
    }

    public function adminReservation($id)
    {
        $user = Auth::user();
        $reservations = Reservation::all()->where('restaurant_id',auth()->user()->VPN)->sortBy("reservation_date");
        $likes = Like::all()->where('user_id',auth()->user()->id)->sortBy("restaurant_id");
        $now = Carbon::now()->format('Y-m-d');
        $dt = Carbon::now();
        $week = $dt->subWeek()->format('Y-m-d');
        return view('admin.adminReservation',['user' => $user, 'reservations' => $reservations, 'likes' => $likes, 'now' =>$now ,'week'=>$week]) ;
    }

    public function adminReview($id)
    {
        $user = Auth::user();
        $reservations = Reservation::all()->where('restaurant_id',auth()->user()->VPN)->sortBy("reservation_date");
        $likes = Like::all()->where('user_id',auth()->user()->id)->sortBy("restaurant_id");
        $now = Carbon::now()->format('Y-m-d');
        $dt = Carbon::now();
        $week = $dt->subWeek()->format('Y-m-d');
        return view('admin.adminReview',['user' => $user, 'reservations' => $reservations, 'likes' => $likes, 'now' =>$now ,'week'=>$week]) ;
    }

}
