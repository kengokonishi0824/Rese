<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;
use Illuminate\Http\Request;

class ReseController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        $prefectures = Prefecture::all();
        $categories = Category::all();
        $param = ['restaurants' => $restaurants,'prefectures' => $prefectures,'categories' => $categories];
        return view('index',$param);
    }

    public function find()
    {
        $restaurant = [];
        return view('search', ['name' => $name, 'prefecture_id' => $prefecture_id, 'category_id' => $category_id]);
    }

public function search(Request $request)
    {
        $name = $request['name'];
        $prefecture_id = $request['prefecture_id'];
        $category_id= $request['category_id'];
        $restaurants = Restaurant::doSearch($name, $prefecture_id, $category_id);
        return view('search', ['name' => $name, 'prefecture_id' => $prefecture_id, 'category_id' => $category_id]);
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

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('home');
    }
}

