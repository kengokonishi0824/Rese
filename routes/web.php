<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReseController;
use App\Http\Controllers\AdminController;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/login', function () {
    return view('adminLogin'); // blade.php
})->middleware('guest:admin');
Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [\App\Http\Controllers\LoginController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegisterForm'])->middleware('auth:admin');
Route::post('/admin/register', [\App\Http\Controllers\RegisterController::class, 'adminRegister'])->middleware('auth:admin')->name('admin.register');
Route::get('/admin/manger', [\App\Http\Controllers\AdminController::class, 'manageRestaurant'])->middleware('auth:admin');
Route::get('/admin/all', [\App\Http\Controllers\AdminController::class, 'restaurantAll'])->middleware('auth:admin');


Route::get('/', [ReseController::class, 'index'])->name('home');
Route::get('/like/{restaurant}',[Resecontroller::class, 'like'])->name('like');
Route::get('/unlike/{restaurant}',[Resecontroller::class, 'unlike'])->name('unlike');
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
Route::post('/done', [ReseController::class, 'reservation']);
Route::get('/done', [ReseController::class, 'reservation']);
Route::get('/mypage', [ReseController::class, 'mypage']);
Route::post('/remove',[Resecontroller::class, 'remove'])->name('remove');
Route::get('/mypage/change/{id}', [ReseController::class, 'mypage_change'])->name('mypage_change');
Route::post('/change_reservation',[Resecontroller::class, 'change_reservation'])->name('change_reservation');
Route::get('/mypage/review/{id}', [ReseController::class, 'mypage_review'])->name('mypage_review');
Route::post('/review', [ReseController::class, 'review'])->name('review');
Route::get('/change_reservation',[Resecontroller::class, 'change_reservation'])->name('change_reservation');
Route::get('/menu1', [ReseController::class, 'menu1']);
Route::get('/menu2', [ReseController::class, 'menu2']);


Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth:admin');
Route::post('/add', [ReseController::class, 'create']);
Route::get('/edit', [ReseController::class, 'edit']);
Route::post('/edit', [ReseController::class, 'update']);
Route::get('/delete', [ReseController::class, 'delete']);
Route::post('/delete', [ReseController::class, 'remove']);
Route::get('/find', [ReseController::class, 'find']);
Route::get('/search', [ReseController::class, 'search']);
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
