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
}
