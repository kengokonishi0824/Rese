<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Time;
use App\Models\People;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReviewRequest;
use Carbon\Carbon;


class ReseController extends Controller
{
    public function index(Request $request)
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
        $people = People::all();
        $times = Time::all();
        return view('detail',['user' =>$user,'restaurants' => $restaurants, 'people' => $people, 'times' => $times]);
    }

    public function reservation(ReservationRequest $request)
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
        $now = Carbon::now()->format('Y-m-d');
        $dt = Carbon::now();
        $week = $dt->subWeek()->format('Y-m-d');
        return view('mypage',['user' => $user, 'reservations' => $reservations, 'likes' => $likes, 'now' =>$now ,'week'=>$week]) ;
    }

    public function mypage_change($id)
    {
        $user = Auth::user();
        $people = People::all();
        $times = Time::all();
        $reservations = Reservation::all()->find($id);
        return view('change',['user' =>$user,'reservations' => $reservations, 'people' => $people, 'times' => $times]);
    }

    public function change_reservation(ReservationRequest $request)
    {
        $form = $request->all();
        Reservation::find($request->id)->update($form);
        return redirect('mypage');
    }

    public function mypage_review($id)
    {
        $user = Auth::user();
        $reservations = Reservation::all()->find($id);
        return view('review',['user' =>$user,'reservations' => $reservations]);
    }

    public function review(ReviewRequest $request)
    {
        $form = $request->all();
        Reservation::find($request->id)->update($form);
        return redirect('mypage');
    }

    public function remove(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect('mypage');
    }

    public function menu1(Request $request)
    {
        return view('menu1');
    }

    public function menu2(Request $request)
    {
        return view('menu2');
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

