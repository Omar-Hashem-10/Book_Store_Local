<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;

Route::middleware('dashboard')->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('discount', DiscountController::class);
    Route::resource('category', CategoryController::class);
    Route::post('/add/discount/{category}', [CategoryController::class, 'addDiscount'])->name('category.add.discount');
    Route::get('/change-language/{lang}',[HomeController::class, 'changeLanguage'])->name('change.language');
});
