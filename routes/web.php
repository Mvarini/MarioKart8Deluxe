<?php

use App\Http\Controllers\DefeatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/index-user', [UserController::class, 'index'])->name('user.index');


// DEFEAT
Route::get('/index-defeat', [DefeatController::class, 'index'])->name('defeat.index');
Route::get('/create-defeat', [DefeatController::class, 'create'])->name('defeat.create');
Route::get('/show-defeat/{defeat}', [DefeatController::class, 'show'])->name('defeat.show');
Route::post('/store-defeat', [DefeatController::class, 'store'])->name('defeat.store');
Route::get('/edit-defeat/{defeat}', [DefeatController::class, 'edit'])->name('defeat.edit');
Route::put('/update-defeat/{defeat}', [DefeatController::class, 'update'])->name('defeat.update');
Route::delete('/destroy-defeat/{defeat}', [DefeatController::class, 'destroy'])->name('defeat.destroy');
