<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\SubCategory\SubCategoryController;
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
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('/','index')->name('users.index');
        Route::post('create','store')->name('users.store');
        Route::post('edit','edit')->name('users.edit');
        Route::post('update','update')->name('users.update');
        Route::post('status','status_toogle')->name('users.status.toogle');
        Route::post('delete','destroy')->name('users.destroy');
        Route::post('details','details')->name('users.details');
        Route::post('image-upload','imageUpload')->name('users.imageUpload');
    });
    Route::controller(CategoryController::class)->prefix( 'categories')->group(function(){
        Route::get('/','index')->name('categories.index');
        Route::post('create','store')->name('categories.store');
        Route::post('edit','edit')->name('categories.edit');
        Route::post('update','update')->name('categories.update');
        Route::post('delete','destroy')->name('categories.destroy');
        Route::post('status','status_toogle')->name('categories.status.toogle');
    });
    Route::controller(SubCategoryController::class)->prefix( 'sub_categories')->group(function(){
        Route::get('/','index')->name('sub_categories.index');
        Route::post('create','store')->name('sub_categories.store');
        Route::post('edit','edit')->name('sub_categories.edit');
        Route::post('update','update')->name('sub_categories.update');
        Route::post('delete','destroy')->name('sub_categories.destroy');
        Route::post('status','status_toogle')->name('sub_categories.status.toogle');
    });
});

