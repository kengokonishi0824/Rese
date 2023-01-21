<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/login', function () {
    return view('admin.adminLogin'); // blade.php
});
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/register', [RegisterController::class, 'adminRegisterForm'])->middleware('auth:admin');
Route::post('/admin/register', [RegisterController::class, 'adminRegister'])->middleware('auth:admin')->name('admin.register');
Route::get('/manager/register', [RegisterController::class, 'managerRegisterForm'])->middleware('auth:admin');
Route::get('/admin/manager', [AdminController::class, 'manageRestaurant'])->middleware('auth:admin');
Route::get('/admin/all', [AdminController::class, 'restaurantAll'])->middleware('auth:admin');
Route::get('/admin/detail/{id}', [AdminController::class, 'adminDetail'])->name('adminDetail')->middleware('auth:admin');
Route::get('/admin/change/{id}', [AdminController::class, 'adminChange'])->name('adminChange')->middleware('auth:admin');
Route::post('/admin/change', [AdminController::class, 'adminChangeRestaurant'])->name('adminChangeRestaurant')->middleware('auth:admin');
Route::get('/admin/addRestaurant', [AdminController::class, 'adminAddRestaurant'])->name('adminAddRestaurant')->middleware('auth:admin');
Route::post('/admin/add', [AdminController::class, 'addRestaurant'])->name('adminAddRestaurant')->middleware('auth:admin');
Route::get('/admin/add', [AdminController::class, 'addRestaurant'])->name('adminAddRestaurant')->middleware('auth:admin');
Route::get('/admin/reservation/{id}', [AdminController::class, 'adminReservation'])->name('adminDetail')->middleware('auth:admin');

Route::get('/', [ReseController::class, 'index'])->name('home');
Route::get('/like/{restaurant}',[Resecontroller::class, 'like'])->name('like');
Route::get('/unlike/{restaurant}',[Resecontroller::class, 'unlike'])->name('unlike');
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
Route::post('/done', [ReseController::class, 'reservation']);
Route::get('/done', [ReseController::class, 'reservation']);
Route::get('/mypage', [ReseController::class, 'mypage'])->middleware('auth');
Route::post('/remove',[Resecontroller::class, 'remove'])->name('remove');
Route::get('/mypage/change/{id}', [ReseController::class, 'mypage_change'])->name('mypage_change');
Route::post('/change_reservation',[Resecontroller::class, 'change_reservation'])->name('change_reservation');
Route::get('/mypage/review/{id}', [ReseController::class, 'mypage_review'])->name('mypage_review');
Route::post('/review', [ReseController::class, 'review'])->name('review');
Route::get('/change_reservation',[Resecontroller::class, 'change_reservation'])->name('change_reservation');
Route::get('/menu1', [ReseController::class, 'menu1'])->middleware('auth');
Route::get('/menu2', [ReseController::class, 'menu2']);


Route::get('/admin', [AdminController::class, 'admin'])->middleware(['auth:admin']);
Route::post('/add', [ReseController::class, 'create']);
Route::get('/edit', [ReseController::class, 'edit']);
Route::post('/edit', [ReseController::class, 'update']);
Route::get('/delete', [ReseController::class, 'delete']);
Route::post('/delete', [ReseController::class, 'remove']);
Route::get('/find', [ReseController::class, 'find']);
Route::get('/search', [ReseController::class, 'search']);
Route::get('/detail/{id}', [ReseController::class, 'detail'])->name('detail');
