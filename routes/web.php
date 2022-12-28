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

Route::get('/home', [ReseController::class, 'index'])->name('home');
Route::get('/like/{restaurant}',[Resecontroller::class, 'like'])->name('like');
Route::get('/unlike/{restaurant}',[Resecontroller::class, 'unlike'])->name('unlike');
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
Route::post('/reservation', [ReseController::class, 'reservation']);
Route::get('/reservation', [ReseController::class, 'reservation']);
Route::get('/mypage', [ReseController::class, 'mypage']);



Route::get('/admin', [ReseController::class, 'admin']);
Route::post('/add', [ReseController::class, 'create']);
Route::get('/edit', [ReseController::class, 'edit']);
Route::post('/edit', [ReseController::class, 'update']);
Route::get('/delete', [ReseController::class, 'delete']);
Route::post('/delete', [ReseController::class, 'remove']);
Route::get('/find', [ReseController::class, 'find']);
Route::get('/search', [ReseController::class, 'search']);
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
