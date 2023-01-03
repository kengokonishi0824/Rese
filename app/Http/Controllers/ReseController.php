<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;


class ReseController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $likes = Like::all();
        $name = $request['name'];
        $prefecture_id = $request['prefecture_id'];
        $category_id= $request['category_id'];
        $restaurants = Restaurant::doSearch($name, $prefecture_id, $category_id);
        $param = ['user' => $user,'prefectures' => $prefectures,'categories' => $categories, 'likes' => $likes];
        return view('index', ['restaurants' => $restaurants,'name' => $name, 'prefecture_id' => $prefecture_id, 'category_id' => $category_id],$param);
    }

    public function like(Restaurant $restaurant, Request $request){
        $like = New Like();
        $like -> restaurant_id = $restaurant -> id;
        $like -> user_id = Auth::user() -> id;
        $like -> save();
        return back();
    }

    public function unlike(Restaurant $restaurant, Request $request){
        $user = Auth::user() -> id;
        $like = Like::where('restaurant_id', $restaurant -> id) -> where('user_id', $user)->first();
        $like -> delete();
        return back();
    }

    public function detail($id)
    {
        $user = Auth::user();
        $restaurants = Restaurant::all()->find($id);
        return view('detail',['user' =>$user,'restaurants' => $restaurants]);
    }

    public function reservation(Request $request)
    {
        $form = $request->all();
        Reservation::create($form);
        return view('done');
    }

    public function mypage(Request $request)
    {
        $user = Auth::user();
        $reservations = Reservation::all()->where('user_id',auth()->user()->id)->sortBy("reservation_date");
        $likes = Like::all()->where('user_id',auth()->user()->id)->sortBy("restaurant_id");
        return view('mypage',['user' => $user, 'reservations' => $reservations, 'likes' => $likes]) ;
    }

    public function remove(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect('mypage');
    }

    public function admin()
    {
        $restaurants = Restaurant::all();
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $param = ['restaurants' => $restaurants,'prefectures' => $prefectures,'categories' => $categories];
        return view('admin',$param);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        Restaurant::create($form);
        return redirect('admin');
    }
        public function edit(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
        $prefecture = Prefecture::find($request->prefecture_id);
        $category = Category::find($request->category_id);
        return view('edit', ['form' => $restaurant, $prefecture,$category]);
    }
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Restaurant::where('id', $request->id,)->update($form);
        return redirect('admin');
    }

    

}

