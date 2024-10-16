<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefeatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// WEB
Route::get('/', [webController::class, 'index'])->name('web.index');

// LOGIN
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login.process');

// DASHBOARD
Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// DEFEAT
Route::get('/index-defeat', [DefeatController::class, 'index'])->name('defeat.index');
Route::get('/create-defeat', [DefeatController::class, 'create'])->name('defeat.create');
Route::get('/show-defeat/{defeat}', [DefeatController::class, 'show'])->name('defeat.show');
Route::post('/store-defeat', [DefeatController::class, 'store'])->name('defeat.store');
Route::get('/edit-defeat/{defeat}', [DefeatController::class, 'edit'])->name('defeat.edit');
Route::put('/update-defeat/{defeat}', [DefeatController::class, 'update'])->name('defeat.update');
Route::delete('/destroy-defeat/{defeat}', [DefeatController::class, 'destroy'])->name('defeat.destroy');

// USER
Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/update-password-user/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');

