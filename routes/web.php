<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefeatController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// WEB
Route::get('/', [webController::class, 'index'])->name('web.index');

// LOGIN
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login.process');

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot.password-show');
Route::post('/forgot-password-process', [ForgotPasswordController::class, 'forgotPasswordProcess'])->name('forgot-password.process');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('password.reset-submit');

// ROTA RESTRITA - USUÁRIO PRECISA ESTAR LOGADO
Route::group(['middleware' => 'auth'], function () {
    // DASHBOARD
    Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // PROFILE
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.password-update');

    // DEFEAT
    Route::get('/index-defeat', [DefeatController::class, 'index'])->name('defeat.index');
    Route::get('/create-defeat', [DefeatController::class, 'create'])->name('defeat.create');
    Route::get('/show-defeat/{defeat}', [DefeatController::class, 'show'])->name('defeat.show');
    Route::post('/store-defeat', [DefeatController::class, 'store'])->name('defeat.store');
    Route::get('/edit-defeat/{defeat}', [DefeatController::class, 'edit'])->name('defeat.edit');
    Route::put('/update-defeat/{defeat}', [DefeatController::class, 'update'])->name('defeat.update');
    Route::delete('/destroy-defeat/{defeat}', [DefeatController::class, 'destroy'])->name('defeat.destroy');
    Route::post('/defeat-import', [DefeatController::class, 'import'])->name('defeat.import');

    // USER
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/update-password-user/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');
    Route::post('/user-import', [UserController::class, 'import'])->name('user.import');

    // LOGOUT
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.destroy');
});
