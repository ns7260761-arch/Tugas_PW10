<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'))->name('home');
Route::resource('posts', PostController::class);