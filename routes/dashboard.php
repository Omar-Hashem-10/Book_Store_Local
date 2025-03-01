<?php

use App\Models\FlashSale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\FlashSaleController;
use App\Http\Controllers\Dashboard\PublisherController;
use App\Http\Controllers\Dashboard\ImportExcelController;

Route::middleware('dashboard')->group(function() {
    Route::get('/', action: [HomeController::class, 'index']);
    Route::resource('discount', DiscountController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('publisher', PublisherController::class);
    Route::resource('flash-sale', FlashSaleController::class);
    Route::resource('category', CategoryController::class);
    Route::post('/add/discount/{category}', [CategoryController::class, 'addDiscount'])->name('category.add.discount');
    Route::get('/change-language/{lang}',[HomeController::class, 'changeLanguage'])->name('change.language');
    Route::post('/delete-items', [HomeController::class, 'bulkDelete'])->name('items.bulk-delete');
    Route::post('/import/excel', ImportExcelController::class)->name('import.excel');
});
