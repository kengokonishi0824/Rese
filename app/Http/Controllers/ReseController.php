<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReseController extends Controller
{
    public function index()
    {
    $restaurants = Restaurant::paginate(4);
    return view('index', ['restaurants' => $restaurants]);
    }

    public function admin()
    {
        return view('admin');
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Restaurant::create($form);
        return redirect('admin');
    }
    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        $prefecture = Prefecture::find($request->id);
        return view('edit', ['form' => $category, $prefecture]);
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Restaurant::where('id', $request->id,)->update($form);
        return redirect('admin');
    }

    public function delete(Request $request)
    {
        $todo = Restaurant::find($request->id);
        return view('delete', ['form' => $todo]);
    }
    public function remove(Request $request)
    {
        Restaurant::find($request->id)->delete();
        return redirect('admin');
    }
}
