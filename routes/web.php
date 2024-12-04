<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefeatController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
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
    Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('permission:index-dashboard');

    // PROFILE
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:update-profile');
    Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.password-update')->middleware('permission:update-password');

    // DEFEAT
    Route::get('/index-defeat', [DefeatController::class, 'index'])->name('defeat.index')->middleware('permission:index-defeat');
    Route::get('/show-defeat/{defeat}', [DefeatController::class, 'show'])->name('defeat.show')->middleware('permission:show-defeat');
    Route::post('/store-defeat', [DefeatController::class, 'store'])->name('defeat.store')->middleware('permission:store-defeat');
    Route::put('/update-defeat/{defeat}', [DefeatController::class, 'update'])->name('defeat.update')->middleware('permission:update-defeat');
    Route::delete('/destroy-defeat/{defeat}', [DefeatController::class, 'destroy'])->name('defeat.destroy')->middleware('permission:destroy-defeat');
    Route::post('/defeat-import', [DefeatController::class, 'import'])->name('defeat.import')->middleware('permission:defeat-import');

    // USER
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index')->middleware('permission:index-user');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store')->middleware('permission:store-user');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('permission:update-user');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:destroy-user');
    Route::put('/update-password-user/{user}', [UserController::class, 'updatePassword'])->name('user.update-password')->middleware('permission:update-password-user');
    Route::post('/user-import', [UserController::class, 'import'])->name('user.import')->middleware('permission:user-import');

    // Roles
    Route::get('/index-role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:index-role');
    Route::post('/store-role', [roleController::class, 'store'])->name('role.store')->middleware('permission:store-role');
    Route::put('/update-role/{role}', [roleController::class, 'update'])->name('role.update')->middleware('permission:update-role');
    Route::delete('/destroy-role/{role}', [roleController::class, 'destroy'])->name('role.destroy')->middleware('permission:destroy-role');


    // Role permission
    Route::get('/index-role-permission/{role}', [RolePermissionController::class, 'index'])->name('role-permission.index')->middleware('permission:index-role-permission');
    Route::get('/update-role-permission/{role}/{permission}', [RolePermissionController::class, 'update'])->name('role-permission.update')->middleware('permission:update-role-permission');

    // Permissions
    Route::get('/index-permission', [PermissionController::class, 'index'])->name('permission.index')->middleware('permission:index-permission');
    Route::post('/store-permission', [PermissionController::class, 'store'])->name('permission.store')->middleware('permission:store-permission');
    Route::put('/update-permission/{permission}', [PermissionController::class, 'update'])->name('permission.update')->middleware('permission:update-permission');
    Route::delete('/destroy-permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy')->middleware('permission:destroy-permission');

    // LOGOUT
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.destroy');
});
