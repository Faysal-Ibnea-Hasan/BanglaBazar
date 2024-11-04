<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/success', 'login')->name('login.process');

});
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::controller(DashboardController::class)->group(function(){
        Route::get('home','index')->name('dashboard');
    });
    Route::controller(UserController::class)->group(function(){
        Route::get('users','index')->name('users.index');
        Route::post('users/create','store')->name('users.store');
        Route::post('users/edit','edit')->name('users.edit');
        Route::post('users/update','update')->name('users.update');
        Route::post('users/status','status_toogle')->name('users.status.toogle');
        Route::post('users/delete','destroy')->name('users.destroy');
        Route::post('users/details','details')->name('users.details');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('categories','index')->name('categories.index');
    });
});

