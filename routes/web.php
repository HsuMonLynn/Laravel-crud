<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/post-deatils/{id}', [PageController::class, 'show'])->name('post-details');
Route::middleware('auth')->group(function () {

    Route::get('home', [HomeController::class, 'index']);
    //users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //posts
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts/import', [PostController::class, 'import'])->name('posts.import');
    Route::get('export-csv', [PostController::class, 'export'])->name('posts.export');
    //categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
  
});
Route::auth();
