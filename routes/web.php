<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::get('/', [HomeController::class, 'index'])->name('name');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoriesController::class);
});
