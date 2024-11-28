<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\MovementController::class, 'report'] )->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');

    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('low_stock', [App\Http\Controllers\ProductController::class, 'lowStock']);

    Route::resource('movements', App\Http\Controllers\MovementController::class);
    Route::get('movements', [App\Http\Controllers\MovementController::class, 'index'])->name('pos');
    Route::get('get_update_stock', [App\Http\Controllers\MovementController::class, 'getUpdateStock'])->name('getUpdateStock');
    Route::post('update_stock', [App\Http\Controllers\MovementController::class,'updateStock'])->name('update_stock');

    Route::get('sales', [App\Http\Controllers\MovementController::class, 'sales']);
    Route::get('get_stock_history', [App\Http\Controllers\MovementController::class, 'stockLoadHistory']);
});

require __DIR__.'/auth.php';
