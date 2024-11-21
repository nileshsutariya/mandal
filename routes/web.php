<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-check',[LoginController::class,'login'])->name('login.check');
Route::get('/register',[UserController::class,'signup'])->name('register');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');

Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');