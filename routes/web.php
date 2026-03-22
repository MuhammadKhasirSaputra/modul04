<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class);



Route::get('/', [HomeController::class, 'index'])->name('home');