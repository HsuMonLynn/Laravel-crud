<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('users',[UserController::class, 'index'])->name('users.index');
Route::post('users',[UserController::class, 'store'])->name('users.store');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::get('users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class,'update'])->name('users.update');
Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('posts',[PostController::class, 'index'])->name('posts.index');
Route::post('posts',[PostController::class, 'store'])->name('posts.store');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('posts/{id}', [PostController::class,'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class,'update'])->name('posts.update');
Route::delete('posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');

Route::get('/', function () {
    if(@Auth::check()){
        Debugbar::startMeasure('render','Time for rendering');
        return view('adminlte.master');
    }
    else{
        return view('auth.login'); 
    }
    
});

Auth::routes();

