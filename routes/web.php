<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MandalController;
use App\Http\Controllers\MandalWiseUserController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-check', [LoginController::class, 'login'])->name('login.check');
Route::get('/register', [UserController::class, 'signup'])->name('register');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::middleware(['users'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/mandaldashboard', [LoginController::class, 'mandaldashboard'])->name('mandaldashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/user/profile', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/notification', [NotificationController::class, 'index'])->name('user.notification');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/mandal/list', [MandalController::class, 'index'])->name('mandal.list');
    Route::get('/mandal/details', [MandalController::class, 'mandaldetails'])->name('mandal.details');
    Route::post('/mandal/store', [MandalController::class, 'store'])->name('mandal.store');

    Route::post('/mandalwiseuser/store', [MandalWiseUserController::class, 'store'])->name('mandalwiseuser.store');
    Route::post('/notification/send', [NotificationController::class, 'store'])->name('notification.send');
    Route::get('/switchaccount', [LoginController::class, 'switchaccount'])->name('switchaccount');
});