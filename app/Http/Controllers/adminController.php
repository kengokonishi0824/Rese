<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class adminController extends Controller
{
    public function manageRestaurant()
    {
        return view('adminManager');
    }
}
