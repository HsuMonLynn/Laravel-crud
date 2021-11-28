<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('users', UserController::class);
Route::get('users',[UserController::class, 'index'])->name('users.index');
Route::post('users',[UserController::class, 'store'])->name('users.store');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::get('users/{user}', [UserController::class,'show'])->name('users.show');
Route::put('users/{user}', [UserController::class,'update'])->name('users.update');
Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
// Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
Route::get('search',[UserController::class,'search'])->name('users.search');

// Route::resource('posts', PostController::class);
Route::get('posts',[PostController::class, 'index'])->name('posts.index');
Route::post('posts',[PostController::class, 'store'])->name('posts.store');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('posts/{id}', [PostController::class,'show'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class,'update'])->name('posts.update');
Route::delete('posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');

// Route::get('/', function () {
//     return view('welcome');
// });
