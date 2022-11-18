<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [ReseController::class, 'index']);