<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('search',SearchController::class)->name('search');

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');